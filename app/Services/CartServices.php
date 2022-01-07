<?php 

namespace App\Services;

use App\Cart;
use App\Items;
use Illuminate\Support\Facades\DB;

class CartServices
{
    /**
     * Add products to cart table.
     *
     * @param Request $request
     * @param App\Cart $cart
     * @return bool
     */
    public function addToCart($request)
    {
        try {
            $cart = new Cart();

            $cart->user_id = $request->user_id;
            $cart->item_id = $request->item_id;

            if ($cart->save())
                return true;
            else    
                return false;
        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function getCartItems($id)
    {
        try {
            $cart_items = DB::table('carts')
                            ->join('items', 'carts.item_id' , '=', 'items.id')
                            ->select('items.*', 'carts.id as cart_id', 'carts.user_id as buyer_id')
                            ->where('user_id', $id)
                            ->get();

            if (empty($cart_items))
                return false;
            else    
                return $cart_items;
        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function calculatePrice($products)
    {
        $price['item'] = 0;
        foreach ($products as $product)
            $price['item'] += $product->price; 

        $price['tax']   = round($price['item'] / 18, 2);
        $price['total'] = $price['item'] + $price['tax'];
        return $price;
    }

    public function removeFromCart($id)
    {
        try {
            $cart = Cart::where('id', $id)->delete();
            if ($cart)
                return true;
            else    
                return false;
        } catch (Throwable $th) {
            throw $th;
        }
    }
}