<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    /**
     * Show all the products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
       $products = Product::all();
       return view('product.index', ['products' => $products]);
    }


    public function findProduct($slug)
    {
        $product = Product::where('slug', $slug)->get();
        return view('product.showProduct', ['product' => $product]);
    }



}
