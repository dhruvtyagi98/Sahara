<?php

namespace App\Repositories;

use App\Cart;
use App\Repositories\Interfaces\CartRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CartRepository implements CartRepositoryInterface
{
    public function getUserCart($id)
    {
        return DB::table('carts')
                ->join('items', 'carts.item_id' , '=', 'items.id')
                ->select('items.*', 'carts.id as cart_id', 'carts.user_id as buyer_id')
                ->where('user_id', $id)
                ->get();
    }

    public function addToCart($request)
    {
        $cart = new Cart();

            $cart->user_id = $request->user_id;
            $cart->item_id = $request->item_id;

            if ($cart->save())
                return true;
            else    
                return false;
    }

    public function deleteById($id)
    {
        return Cart::where('id', $id)->delete();
    }

    public function deleteByUserId($id)
    {
        return Cart::where('user_id', $id)->delete();
    }

    public function getCart($id)
    {
        return Cart::where('user_id', $id)->get();
    }
}