<?php 

namespace App\Services;

use App\Items;
use Illuminate\Support\Facades\Auth;

class ProductService
{
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
        $upload_path          = 'images/users/'.Auth::user()->id.'/';
        $image_url            = $upload_path.$image_full_name;
        $product_image->move($upload_path,$image_full_name);
        $image  = $image_url;
        $product->picture = $image;

        if ($product->save()) 
            return true;
        else
            return false;
    }

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
}