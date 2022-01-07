<?php 

namespace App\Services;

use App\Items;
use App\Order;

class OrderService
{
    public function getOrderHistory($id)
    {
        try {
            $order = Order::where('user_id', $id)->get()->toArray();

            if (empty($order))
                return false;
            else    
                return $order;
        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function getOrderItems($orders)
    {
        try {
            $i = 0;
            foreach ($orders as $order) {
                $order_item_ids = json_decode($order['order']); 
                $items[$i++] = Items::whereIn('id', $order_item_ids)->get();
            }

            if (empty($items))
                return false;
            else    
                return $items;
        } catch (Throwable $th) {
            throw $th;
        }
    }
}