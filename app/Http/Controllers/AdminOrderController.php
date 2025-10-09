<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategoryId = $request->integer('category');
        $show = $request->input('show', 'all'); // 'active' | 'all'

        // Categories with counts (green = active, red = total incl. archived)
        $categories = Category::query()
            ->withCount([
                'orders as active_orders_count' => fn($q) => $q->where('status', '!=', 'completed')
                    ->where('created_at', '>', now()->subWeeks(2)),
                'orders as total_orders_count'  => fn($q) => $q,
            ])
            ->orderBy('name')
            ->paginate(20);

        // Orders for the selected category
        $orders = null;
        $selectedCategory = null;

        if ($selectedCategoryId) {
            $selectedCategory = Category::find($selectedCategoryId);

            $ordersQuery = Order::with(['category', 'user'])
                ->withCount('offers')
                ->where('category_id', $selectedCategoryId)
                ->latest();

            if ($show === 'active') {
                $ordersQuery->where('status', '!=', 'completed')
                    ->where('created_at', '>', now()->subWeeks(2));
            }

            $orders = $ordersQuery->paginate(10)->withQueryString();
        }

        return view('admin.orders.index', compact(
            'categories',
            'orders',
            'selectedCategory',
            'selectedCategoryId',
            'show'
        ));
    }
    public function close(Order $order)
    {
        $order->update(['status' => 'archived']);   // ← was 'completed'
        return back()->with('success', 'Pasūtījums arhivēts.');
    }

    public function destroy(Order $order)
    {
        // delete attachments from storage (if using private disk path in file_path)
        foreach ($order->attachments as $att) {
            if ($att->file_path && Storage::disk('private')->exists($att->file_path)) {
                Storage::disk('private')->delete($att->file_path);
            }
            $att->delete();
        }

        $order->delete();

        // If coming from admin list, go back there; otherwise back()
        return redirect()->route('admin.orders')->with('success', 'Pasūtījums dzēsts.');
    }

    public function downloadDocuments(Order $order)
    {
        $files = $order->attachments()->pluck('file_path')->filter()->values();
        if ($files->isEmpty()) {
            return back()->with('error', 'Nav dokumentu lejupielādei.');
        }

        $zipName = 'order-' . $order->id . '-documents.zip';
        $zipPath = storage_path('app/private/' . $zipName);

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($files as $path) {
                if (Storage::disk('private')->exists($path)) {
                    $zip->addFromString(basename($path), Storage::disk('private')->get($path));
                }
            }
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
