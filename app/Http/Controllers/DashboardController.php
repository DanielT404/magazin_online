<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as Product;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = [
            'color' => Product::findOrFail(20)->getColor,
            'length' => Product::findOrFail(20)->getLength
            ];

        return view('dashboard.index', ['subcategories' => $product]);
    }
}
