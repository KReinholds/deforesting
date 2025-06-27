<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PublicController extends Controller
{
    public function home()
    {
        $totalOrders = Order::count();
        $uniqueClients = Order::distinct('user_id')->count('user_id');

        return view('public.sakums', compact('totalOrders', 'uniqueClients')); // Or whatever view you're rendering
    }
}
