<?php

namespace App\Http\Controllers;

use OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrderHistory($id)
    {
        try {
            $orders      = OrderService::getOrderHistory($id);
            $products    = OrderService::getOrderItems($orders);
            
            if (!$orders)
                return view('user.orders')->withErrors(['message' => 'No orders Found']);
            else
                return view('user.orders')->with(['orders' => $orders, 'products' => $products]);

        } catch (Throwable $th) {
            throw $th;
        }
    }
}
