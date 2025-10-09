<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderAttachment;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['category', 'user']);

        // ✅ Only ACTIVE orders for public/browse:
        //    - NOT completed
        //    - created within the last 2 weeks
        $query->where('status', '!=', 'completed')
            ->where('created_at', '>', now()->subWeeks(2));

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        $orders = $query->latest()->paginate(2);
        $categories = Category::all();

        return view('orders.index', compact('orders', 'categories'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('orders.create-order', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'kadastrs'    => 'required|string|max:255',
            'platiba'     => 'nullable|string|max:255',
            'mervieniba'  => 'nullable|string|max:255',
            'pazimes'     => 'nullable|string|max:255',
            'pilseta'     => 'nullable|string|max:255',
            'tel'         => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'description' => 'required|string',
        ]);

        $order = \App\Models\Order::create([
            'user_id'     => auth()->id(),
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'kadastrs'    => $request->kadastrs,
            'platiba'     => $request->platiba,
            'mervieniba'  => $request->mervieniba,
            'pazimes'     => $request->pazimes,
            'pilseta'     => $request->pilseta,
            'tel'         => $request->tel,
            'email'       => $request->email,
            'description' => $request->description,
            'status'      => 'izskatīšanā',
        ]);

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $filePath = $file->store('orders/documents', 'private');

                \App\Models\OrderAttachment::create([
                    'order_id'  => $order->id,
                    'file_path' => $filePath,
                ]);
            }
        }

        return redirect()->route('orders.create-order')
            ->with('order_id', $order->id)
            ->with('show_success_modal', true);
    }

    public function show(Order $order)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Allow: order owner, admin, or subscribed users
        if ($user->id === $order->user_id || $user->is_admin || $user->is_subscribed) {
            $order->load(['category', 'offers.user']);

            return view('orders.show-order', [
                'order' => $order,
                'canViewOffers' => true,
            ]);
        }

        abort(403, 'Unauthorized');
    }

    public function archive()
    {
        $user = auth()->user();

        $orders = Order::with('category')
            ->withCount('offers') // or ->withCount(['offers as offers_count' => fn($q) => $q])
            ->where('user_id', $user->id)
            // ⬇️ replace your current where(...) with this:
            ->where(function ($q) {
                $q->whereIn('status', ['completed', 'archived'])
                    ->orWhere('created_at', '<=', now()->subWeeks(2));
            })
            ->latest()
            ->paginate(10);

        return view('orders.archive', compact('orders'));
    }

    public function clientIndex()
    {
        // ✅ Only ACTIVE orders for this client
        $orders = Order::with(['category'])
            ->withCount('offers')
            ->where('user_id', auth()->id())
            ->where('status', '!=', 'completed')
            ->where('created_at', '>', now()->subWeeks(2))
            ->latest()
            ->paginate(3);

        return view('orders.client-index', compact('orders'));
    }
}
