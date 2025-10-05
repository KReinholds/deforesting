<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Offer;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'latestOrders' => Order::latest()->take(5)->get(),
            'latestOffers' => Offer::latest()->take(5)->get(),
            'latestUsers'  => User::latest()->take(5)->get(),
        ]);
    }
}
