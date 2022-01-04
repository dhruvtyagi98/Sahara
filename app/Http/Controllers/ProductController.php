<?php

namespace App\Http\Controllers;

use ProductService;
use App\Http\Requests\AddProductRequest;
use App\Items;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Returns view od Add project.
     *
     * @return void
     */
    public function getAddProductView()
    {
        return view('products.add_products');
    }

    /**
     * Returns view of Products listed by user
     *
     * @return void
     */
    public function getUserProductsView()
    {
        return view('user.listed-items');
    }

    /**
     * The Functions receives data of product and insert it into the database.
     *
     * @param AddProductRequest $request
     * @param bool $request
     * @return void
     */
    public function addProduct(AddProductRequest $request)
    {
        $request->validated();
        $result = ProductService::addProduct($request);

        if ($result) 
            return back()->with('message', 'Product Added Successfully');
        else    
            return back()->withErrors('Please try Again Later!');
    }

    /**
     * Gets and calulates the popular products on the basis of how many products
     * were available to how many products were sold.
     * 
     * @param Item $$products
     * @param array $popular_products
     * @param array $results
     * @param int $i
     * @return bool,array [success,data]
     */
    public function getPopularProducts()
    {
        $products         = Items::all();
        $popular_products = [];
        $results          = [];
        $i                = 0;

        foreach ($products as $product) {
            $available            = $product->quantity;
            $sold                 = $product->quantity_sold;
            $total                = $available + $sold;
            $popular_products[$i] = ['calc' => $sold / $total, 'id' => $product->id]; 
            $i++;
        }

        arsort($popular_products);
        $popular_products = array_slice($popular_products,0,9);

        for ($i = 0; $i < count($popular_products); $i++)
            $results[$i] = Items::where('id', $popular_products[$i]['id'])->first(); 

        if (empty($results)) 
            return (['success' => false, 'data' => $results]);
        else
            return (['success' => true, 'data' => $results]);
    }
}
