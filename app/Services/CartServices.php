<?php 

namespace App\Services;

use App\Cart;
use App\Items;
use App\Order;
use App\Repositories\Interfaces\CartRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartServices
{
    private $cart_repository;

    public function __construct(CartRepositoryInterface $cart_repository)
    {
        $this->cart_repository = $cart_repository;
    }

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

    /**
     * Add orders to orders table.
     *
     * @param Request $request
     * @param App\Order $cart
     * @return bool
     */
    public function checkout($id, $price)
    {
        try {
            $cart_items = $this->cart_repository->getCart($id);
            $order_ids  = [];
            $i          = 0;

            foreach ($cart_items as $item)
            {
                $order_ids[$i] = $item->item_id;
                $i++;
            }

            $order = new Order();

            $order->user_id = $id;
            $order->order   = json_encode($order_ids);
            $order->address = Auth::user()->address;
            $order->price   = $price; 

            if ($order->save()){
                
                for ($i=0; $i < count($order_ids); $i++) {
                    $remove_from_cart = $this->cart_repository->deleteByUserId($id);   
                }
                return true;
            }
            else    
                return false;
        } catch (Throwable $th) {
            throw $th;
        }
    }
}