<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use App\Models\Order as Order;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    /**
     * Return all categories
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllCategories()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', ['categories' => $categories]);
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

    /**
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add_category(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);
        if($validator->fails()) {
            return view('dashboard.categories.add_category')
                ->withErrors($validator);
        }

        if(Category::create(['name' => $request->input('name')])) {
            return view('dashboard.categories.add_category', ['success' => true]);
        }

        return view('dashboard.categories.add_category');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit_category(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        if($request->has('submitted') && $category) {
            Category::where('id', $category->id)
                ->update(['name' => $request->input('name')]);
            return view('dashboard.categories.edit_category', ['success' => true]);
        }
        return view('dashboard.categories.edit_category', ['category' => $category]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function delete_category(Request $request, $id)
    {
        if(Category::where('id', $id)->delete()) {
            return redirect(route('categories'))->with('deleted', true);
        }
        return view('dashboard.categories.index', ['deleted' => false]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add_subcategory(Request $request, $id)
    {

        $category = Category::findOrFail($id);

        if($request->has('submitted') && $category) {
            $subcategory = Subcategory::create(
                [
                    'name' => $request->input('name'),
                    'category_id' => $category->id
                ]
            );

            if($subcategory) {
                return view('dashboard.categories.add_subcategory', ['added' => true]);
            }
        }
        return view('dashboard.categories.add_subcategory', ['category' => $category]);
    }

    public function add_product(Request $request)
    {

        if($request->has('submitted')) {
            $validator = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'description' => 'required|min:5',
                    'image' => 'required',
                    'price' => 'required|numeric',
                    'currencyradio' => 'required',
                    'colorOptionradio' => 'required',
                    'lengthOptionradio' => 'required',
                    'featuredradio' => 'required'
                ]);
            if($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->all());
            }

            if(Product::create(
                [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => $request->input('image'),
                'currency' => $request->input('currency'),
                'color_option' => $request->input('colorOptionradio'),
                'length_option' => $request->input('lengthOptionradio'),
                'featured' => $request->input('featuredradio')
                ]
            )) {
                return view('dashboard.products.add_product')->with('added', true);
            }
        }

        return view('dashboard.products.add_product');
    }




}
