<?php

namespace App\Http\Controllers;

use ProductService;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Returns view of Products listed by seller with all the products listed by the seller
     *
     * @param object $products
     * @return array products/error
     */
    public function getUserProductsView(Request $request)
    {
        try {
            $products = ProductService::getAllUserProducts($request->id);
            if (!$products)
                return view('user.listed-items')->withErrors(['message' => 'No Products Found']);
            else
                return view('user.listed-items')->with(['products' => $products]);

        } catch (Throwable $th) {
            throw $th;
        }
    }

    /**
     * Returns view of Products details by getting the data on the basis of product id
     *
     * @param int $id
     * @param object $product
     * @return array products/error
     */
    public function getProductDetails($id)
    {
        try {
            $product = ProductService::getProduct($id);
            if (!$product)
                return view('products.product_details')->withErrors(['message' => 'No Product Found']);
            else
                return view('products.product_details')->with(['product' => $product]);

        } catch (Throwable $th) {
            throw $th;
        }
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
        $results = ProductService::getPopularProducts();

        if (!$results) 
            return (['success' => false, 'data' => $results]);
        else
            return (['success' => true, 'data' => $results]);
    }

    /**
     * Returns view of Products listed by seller with all the products listed by the seller
     *
     * @param object $products
     * @return array products/error
     */
    public function getProduct($id)
    {
        try {
            $products = ProductService::getProduct($id);
            if (!$products)
                return (['success' => false, 'message' => 'No Products Found']);
            else
                return (['success' => true, 'product' => $products]);

        } catch (Throwable $th) {
            throw $th;
        }
    }

    /**
     * This functions gets items from items table on the basis of name and description 
     * sorted in ascending order by default but can also return in descending order.    
     *
     * @param SearchRequest $request
     * @param Collection $products
     * @return Collection $products
     */
    public function search(SearchRequest $request)
    {
        try {
            $products = ProductService::search($request);

            if (!$products)
                return view('products.search_results')->withErrors(['message' => 'No Products Found']);
            else
                return view('products.search_results')->with(['products' => $products]);

        } catch (Throwable $th) {
            throw $th;
        }
    }

    /**
     * This functions gets items from items table on the basis of name and description 
     * sorted in ascending order by default but can also return in descending order and 
     * also filtered on the basis of category and gender.    
     *
     * @param Request $request
     * @param Collection $products
     * @return Collection $products
     */
    public function searchFilter(Request $request)
    {
        try {
            $products = ProductService::searchFilter($request);

            if (!$products)
                return view('products.search_results')->withErrors(['message' => 'No Products Found', 'products' => null]);
            else
                return view('products.search_results')->with(['products' => $products]);

        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function getSimilarProducts()
    {
        try {
            $results = ProductService::getSimilarProducts(Auth::user()->id);
            
            if (empty($results)) 
            return (['success' => false, 'data' => $results]);
        else
            return (['success' => true, 'data' => $results]);
        } catch (Throwable $th) {
            throw $th;
        }
    }
}
