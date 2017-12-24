<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Order as Order;

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

    /**
     * Return all categories
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllCategories()
    {
        $categories = Category::all();
        return view('dashboard.index', ['categories' => $categories]);
    }

    /**
     * Return all orders
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllOrders()
    {
        $orders = Order::all();
        return view('dashboard.orders.index', ['orders' => $orders]);
    }

    /**
     * Return all products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllProducts()
    {
        $products = Product::all();
        return view('dashboard.products.index', ['products' => $products]);
    }


    /**
     * Accept Order by its id
     * @param Order $id
     */
    public function acceptOrder(Order $id)
    {
        Order::where('id', $id)
            ->update('approved', true);
    }

    /**
     * Reject Order by its id
     * @param Order $id
     */
    public function rejectOrder(Order $id)
    {
        Order::where('id', $id)
            ->update('approved', false);
    }

}
