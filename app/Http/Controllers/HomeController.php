<?php

namespace App\Http\Controllers;

use App\Models\Category as Category;
use App\Models\Product as Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured_products = Product::where('featured', 1)
            ->orderBy('name', 'desc')
            ->get();
        return view('front.index', ['products' => $featured_products]);
    }
}
