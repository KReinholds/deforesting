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

        // Exclude archived orders (completed or older than 2 weeks)
        $query->where(function ($q) {
            $q->where('status', '!=', 'completed')
                ->orWhere('created_at', '>', now()->subWeeks(2));
        });

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
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'kadastrs' => 'required|string|max:255',
            'platiba' => 'nullable|string|max:255',
            'mervieniba' => 'nullable|string|max:255',
            'pazimes' => 'nullable|string|max:255',
            'pilseta' => 'nullable|string|max:255',
            'tel' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|string',
        ]);

        // ✅ Create the order once
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
            'status'      => 'izskatīšanā', // waiting for admin
        ]);

        // ✅ Attach files if any
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

        // Guest users — redirect to login
        if (!$user) {
            return redirect()->route('login');
        }

        // ✅ Allow full access for:
        // - the order creator
        // - admins
        // - subscribed users
        if (
            $user->id === $order->user_id ||
            $user->is_admin ||
            $user->is_subscribed
        ) {
            $order->load(['category', 'offers.user']);

            return view('orders.show-order', [
                'order' => $order,
                'canViewOffers' => true,
            ]);
        }
    }



    public function archive()
    {
        $user = auth()->user();

        $orders = Order::with('category')
            ->where('user_id', $user->id)
            ->where(function ($query) {
                $query->whereHas('offers', function ($subQuery) {
                    $subQuery->where('status', 'completed');
                })
                    ->orWhere('created_at', '<=', now()->subWeeks(2));
            })
            ->withCount(['offers as offers_count' => function ($q) {
                $q->where('status', 'completed');
            }])
            ->latest()
            ->paginate(10);

        return view('orders.archive', compact('orders'));
    }


    public function clientIndex()
    {
        $orders = Order::with(['category'])
            ->withCount('offers') // ✅ adds `offers_count` to each order
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(3);

        return view('orders.client-index', compact('orders'));
    }
}
