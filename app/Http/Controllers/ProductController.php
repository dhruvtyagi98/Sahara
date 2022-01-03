<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAddProductView()
    {
        return view('products.add_products');
    }
}
