<?php 

namespace App\Services;

use App\Items;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProductService
{
    /**
     * This function is used to add products to the database
     *
     * @param AddProductRequest $request
     * @param App\Items $product
     * @param file $product_image
     * @param string $image_full_name
     * @param string $upload_path
     * @param string $image_url
     * @param string $image
     * @return bool
     */
    public function addProduct($request)
    {
        $product = new Items();
        $product->name        = $request->product_name;
        $product->description = $request->product_description;
        $product->category    = $request->product_category;
        $product->gender      = $request->gender;
        $product->size        = $request->product_size;
        $product->quantity    = $request->product_quantity;
        $product->price       = $request->product_price;
        $product->location    = $request->product_location;
        $product->seller_id   = Auth::user()->id;

        $product_image        = $request->file('product_img');

        $image_full_name      = $request->product_name.'.'.strtolower($product_image->getClientOriginalExtension());
        $upload_path          = 'users/'.Auth::user()->id.'/';
        $image_url            = $upload_path.$image_full_name;
        $product_image->move($upload_path,$image_full_name);
        $image  = $image_url;
        $product->picture = $image;

        if ($product->save()) 
            return true;
        else
            return false;
    }

    /**
     * This Function gets all the products from the database listed by a seller on the basis of
     * seller_id
     *
     * @param int $seller_id
     * @param object $products
     * @return object/bool $products/false
     */
    public function getAllUserProducts($seller_id)
    {
        try {
            $products = Items::where('seller_id', $seller_id)->get();
            if (empty($products))
                return false;
            else    
                return $products;
        } catch (Throwable $th) {
            throw $th;
        }
    }

    /**
     * This function gets a product from the database on the basis of id.
     *
     * @param int $id
     * @param object $product
     * @return object/bool $product/false
     */
    public function getProduct($id)
    {
        try {
            $product = Items::where('id', $id)->first();
            if (empty($product))
                return false;
            else    
                return $product;
        } catch (Throwable $th) {
            throw $th;
        }
    }

    /**
     * This function gets products from the database on the basis of the 
     * name and description of the product that the user searched.
     *
     * @param SearchRequest $request
     * @param Collection $products
     * @return object/bool $products/false
     */
    public function search($request)
    {
        try {
            if ($request->sort_price == 'DESC') {
                $products = Items::where('name', 'like', '%'.$request->search.'%')
                            ->orWhere('description', 'like', '%'.$request->search.'%')
                            ->orderBy('price', 'DESC')
                            ->paginate(10);
            }
            else{
                $products = Items::where('name', 'like', '%'.$request->search.'%')
                            ->orWhere('description', 'like', '%'.$request->search.'%')
                            ->orderBy('price')
                            ->paginate(10);
            }

            if (empty($products))
                return false;
            else    
                return $products->appends(Input::except('page'));

        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function searchFilter($request)
    {
        try {
            $search_name        = [['name', 'like', '%'.$request->search.'%']];
            $search_description = [['description', 'like', '%'.$request->search.'%']];

            if (isset($request->product_category)){
                array_push($search_name, ['category', $request->product_category]);
                array_push($search_description, ['category', $request->product_category]);
            }
            if (isset($request->gender)){
                array_push($search_name, ['gender', $request->gender]);
                array_push($search_description, ['gender', $request->gender]);
            }

            $products = Items::where($search_name)
                            ->orWhere($search_description)
                            ->paginate(10);

            // dd($products);
            if (empty($products))
                return false;
            else    
                return $products->appends(Input::except('page'));

        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function getSimilarProducts($user_id)
    {
        try {
            $order            = Order::where('user_id', $user_id)->latest('created_at')->first();
            $order_item_ids   = json_decode($order['order']); 

            $last_order       = Items::where('id', $order_item_ids[0])->first();
            $similar_products = Items::where('category', $last_order->category)
                                    ->where('gender', $last_order->gender)
                                    ->take(4)
                                    ->get();
            
            if (empty($similar_products))
                return false;
            else    
                return $similar_products;

        } catch (Throwable $th) {
            throw $th;
        }
    }
}