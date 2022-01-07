<?php

namespace App\Http\Controllers;

use OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrderHistory(Request $request)
    {
        try {
            $orders   = OrderService::getOrderHistory($request->id);
            $products = OrderService::getOrderItems($orders);
            
            if (!$orders)
                return view('user.orders')->withErrors(['message' => 'No orders Found']);
            else
                return view('user.orders')->with(['orders' => $orders, 'products' => $products]);

        } catch (Throwable $th) {
            throw $th;
        }
    }
}
