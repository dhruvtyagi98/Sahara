<?php

namespace App\Http\Controllers;

use App\Events\RegisterEmailEvent;
use App\Order;
use OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getOrderHistory(Request $request)
    {
        try {
            $orders   = OrderService::getOrderHistory($request->id);
            $products = OrderService::getOrderItems($orders);
            $order1 = Order::find(8);
            $order2 = Order::find(8);
            $order1->address = "ywvdajhsfvsjdhvfsjhvfah";
            dd($order2->address);
            if (!$orders)
                return view('user.orders')->withErrors(['message' => 'No orders Found']);
            else
                return view('user.orders')->with(['orders' => $orders, 'products' => $products]);

        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function getAllOrders()
    {
        try {
            $orders   = OrderService::getAllOrders();
            $products = OrderService::getOrderItems($orders);

            if (!$orders)
                return view('user.all-orders')->withErrors(['message' => 'No orders Found']);
            else
                return view('user.all-orders')->with(['orders' => $orders, 'products' => $products]);

        } catch (Throwable $th) {
            throw $th;
        }
    }
}
