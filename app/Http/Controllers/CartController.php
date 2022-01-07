<?php

namespace App\Http\Controllers;

use CartServices;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * This function gets the items from cart table and returns the view of
     * cart
     *
     * @param int $id
     * @param object $cart_items
     * @return void
     */
    public function getCart(Request $request)
    {
        try {
            $cart_items = CartServices::getCartItems($request->id); 
            if (!$cart_items)
                return view('user.cart')->withErrors(['message' => 'No Products Found']);
            else{
                $price = CartServices::calculatePrice($cart_items);
                return view('user.cart')->with(['products' => $cart_items, 'price' => $price]);
            }
        } catch (Throwable $th) {
            throw $th;
        }
    }

    /**
     * The Functions receives data of Cart and insert it into the database.
     *
     * @param Request $request
     * @param bool $request
     * @return void
     */
    public function addToCart(Request $request)
    {
        $result = CartServices::addToCart($request);

        if ($result) 
            return back()->with('message', 'Product Added To Cart');
        else    
            return back()->withErrors('Please try Again Later!');
    }

    public function removeFromCart(Request $request)
    {
        $result = CartServices::removeFromCart($request->id);

        if ($result) 
            return back()->with('message', 'Product Added To Cart');
        else    
            return back()->withErrors('Please try Again Later!');
    }

    public function checkout(Request $request)
    {
        $result = CartServices::checkout($request->user_id, $request->price);

        if ($result) 
            return back()->with('message', 'Your Order will Arrive Shortly');
        else    
            return back()->withErrors('Please try Again Later!');
    }
}
