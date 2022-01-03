<?php

namespace App\Http\Controllers;

use ProductService;
use App\Http\Requests\AddProductRequest;
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
     * The Functions receives data of product and insert it into the database.
     *
     * @param AddProductRequest $request
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
}
