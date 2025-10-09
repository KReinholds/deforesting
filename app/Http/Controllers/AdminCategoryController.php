<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    // app/Http/Controllers/AdminOrderController.php
    public function index(Request $request)
    {
        // 1) Category counters (green = active, red = total)
        $categories = Category::query()
            ->withCount([
                'orders as active_orders_count' => fn($q) =>
                $q->whereNotIn('status', ['completed', 'archived'])
                    ->where('created_at', '>', now()->subWeeks(2)),
                'orders as total_orders_count'  => fn($q) => $q,
            ])
            ->orderBy('name')
            ->paginate(20);

        // 2) Orders for a clicked category (optional)
        $selectedCategoryId = (int) $request->query('category');
        $show = $request->query('show', 'all'); // 'active' | 'all'

        $orders = null;
        $selectedCategory = null;

        if ($selectedCategoryId) {
            $selectedCategory = Category::find($selectedCategoryId);

            $ordersQuery = Order::with(['category', 'user'])
                ->withCount('offers')
                ->where('category_id', $selectedCategoryId)
                ->latest();

            // ⬇️ THIS is where that filter goes
            if ($show === 'active') {
                $ordersQuery->whereNotIn('status', ['completed', 'archived'])
                    ->where('created_at', '>', now()->subWeeks(2));
            }
            // else: show = 'all' -> no extra filter (includes archived)

            $orders = $ordersQuery->paginate(10)->withQueryString();
        }

        // 3) Return the ADMIN ORDERS view (not admin.categories)
        return view('admin.orders.index', compact(
            'categories',
            'orders',
            'selectedCategory',
            'selectedCategoryId',
            'show'
        ));
    }
}
