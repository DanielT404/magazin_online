<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Length;
use App\Models\SideSliderImage;
use App\Models\SliderImage;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllColors()
    {
        $colors = Color::all();
        return view('dashboard.colors.index', ['colors' => $colors]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllLengths()
    {
        $lengths = Length::all();
        return view('dashboard.lengths.index', ['lengths' => $lengths]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllSliderImages()
    {
        $images = SliderImage::all();
        return view('dashboard.images.slider_images', ['images' => $images]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllSideSliderImages()
    {
        $images = SideSliderImage::all();
        return view('dashboard.images.side_slider_images', ['images' => $images]);
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
        if($request->has('submitted')) {
            $validator = Validator::make($request->all(), ['name' => 'required', 'image' => 'required']);
            if($validator->fails()) {
                return view('dashboard.categories.add_category')
                    ->withErrors($validator);
            }
            if($request->has('submitted')) {
                if($request->hasFile('image') && $request->file('image')->isValid()) {
                    Category::create(['name' => $request->input('name'), 'slug' => str_slug($request->input('name'), '-'), 'image_path' => $request->file('image')->store('categories', 'public')]);
                    return view('dashboard.categories.add_category', ['success' => true]);
                }
            }
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

            if($request->hasFile('image') && $request->file('image')->isValid())
            {
                Category::where('id', $category->id)
                    ->update(['name' => $request->input('name'), 'slug' => str_slug($request->input('name'), '-'), 'image_path' => $request->file('image')->store('categories', 'public')]);
            } else {
                Category::where('id', $category->id)
                    ->update(['name' => $request->input('name')]);
            }
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
        $colors = Color::all();
        $lengths = Length::all();
        $categories = Category::all();

        if($request->has('submitted')) {

            $validator = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'description' => 'required|min:5',
                    'price' => 'required|numeric',
                    'image' => 'required',
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
                    'slug' => str_slug($request->input('name'), '-'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
                'color_id' => $request->input('colorOptionradio') == 'No' ? null : $request->input('color_id'),
                'image' => $request->file('image')->store('products', 'public'),
                'length_id' => $request->input('lengthOptionradio') == 'No' ? null : $request->input('length_id'),
                'currency' => $request->input('currencyradio'),
                'price' => $request->input('price'),
                'color_option' => $request->input('colorOptionradio'),
                'length_option' => $request->input('lengthOptionradio'),
                'stock' => $request->input('stock'),
                'featured' => $request->input('featuredradio')
                ]
            )) {
                return view('dashboard.products.add_product', ['added' => true, 'colors' => $colors, 'lengths' => $lengths]);
            }
        }

        return view('dashboard.products.add_product', ['colors' => $colors, 'lengths' => $lengths, 'categories' => $categories]);
    }

    public function edit_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $colors = Color::all();
        $lengths = Length::all();
        $categories = Category::all();

        if($request->has('submitted')) {
            $validator = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'description' => 'required|min:5',
                    'price' => 'required',
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

            if($request->hasFile('image') && $request->file('image')->isValid())
            {
                Product::where('id', $id)
                    ->update([
                        'name' => $request->input('name'),
                        'slug' => str_slug($request->input('name'), '-'),
                        'description' => $request->input('description'),
                        'image' => $request->file('image')->store('products', 'public'),
                        'currency' => $request->input('currencyradio'),
                        'price' => $request->input('price'),
                        'category_id' => $request->input('category_id'),
                        'color_id' => $request->input('colorOptionradio') == 'No' ? null : $request->input('color_id'),
                        'length_id' => $request->input('lengthOptionradio') == 'No' ? null : $request->input('length_id'),
                        'stock' => $request->input('stock'),
                        'featured' => $request->input('featuredradio')
                    ]);
            } else {
                Product::where('id', $id)
                    ->update([
                        'name' => $request->input('name'),
                        'description' => $request->input('description'),
                        'currency' => $request->input('currencyradio'),
                        'price' => $request->input('price'),
                        'category_id' => $request->input('category_id'),
                        'color_id' => $request->input('colorOptionradio') == 'No' ? null : $request->input('color_id'),
                        'length_id' => $request->input('lengthOptionradio') == 'No' ? null : $request->input('length_id'),
                        'stock' => $request->input('stock'),
                        'featured' => $request->input('featuredradio')
                    ]);
            }

            return view('dashboard.products.edit_product')->with('success', true);
        }

        return view('dashboard.products.edit_product', ['product' => $product, 'colors' => $colors, 'lengths' => $lengths, 'categories' => $categories]);
    }


    /** Colors */

    public function add_color(Request $request)
    {

        if($request->has('submitted')) {
            if(Color::create(['color' => $request->color])) {
                return view('dashboard.colors.add_color')->with('success', true);
            }
        }

        return view('dashboard.colors.add_color');
    }

    public function delete_color(Request $request, $id)
    {
        if(Color::where('id', $id)->delete()) {
            return redirect(route('colors'))->with('deleted', true);
        }
        return view('dashboard.colors.index');
    }

    /** Lengths */
    public function add_length(Request $request)
    {
        if($request->has('submitted')) {
            if(Length::create(['length' => $request->input('length')])) {
                return view('dashboard.lengths.add_length')->with('success', true);
            }
        }

        return view('dashboard.lengths.add_length');
    }

    public function delete_length(Request $request, $id)
    {
        if(Length::where('id', $id)->delete()) {
            return redirect(route('lengths'))->with('deleted', true);
        }
        return view('dashboard.lengths.index');
    }



    /** Slider images */

    public function add_slider_image(Request $request)
    {

        if($request->has('submitted')) {
            $validator = Validator::make($request->all(),
                [
                    'image' => 'required'
                ]);
            if($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->all());
            }

            if($request->hasFile('image') && $request->file('image')->isValid()) {

                SliderImage::create(['image_path' => $request->file('image')->store('slider', 'public'), 'active' => $request->input('activeradio')]);
                return view('dashboard.images.add_slider_image')->with('success', true);
            }
        }

        return view('dashboard.images.add_slider_image');

    }

    public function edit_slider_image(Request $request, $id, $status)
    {
       if(true) {
           if ($status) {
               SliderImage::where('id', $id)->update(['active' => 0]);
           } else {
               SliderImage::where('id', $id)->update(['active' => 1]);
           }
           return redirect(route('slider_images'))->with('success', true);
       }
       return view('dashboard.images.slider_images');
    }

    /** Side Slider images */
    public function add_side_slider_image(Request $request)
    {

        if($request->has('submitted')) {
            $validator = Validator::make($request->all(),
                [
                    'image' => 'required'
                ]);
            if($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->all());
            }

            if($request->hasFile('image') && $request->file('image')->isValid()) {

                SideSliderImage::create(['path_image' => $request->file('image')->store('side_slider', 'public'), 'active' => $request->input('activeradio')]);
                return view('dashboard.images.add_side_slider_image')->with('success', true);
            }
        }

        return view('dashboard.images.add_side_slider_image');

    }

    public function edit_side_slider_image(Request $request, $id, $status)
    {
        if(true)
        {
            if($status) {
                SideSliderImage::where('id', $id)->update(['active' => 0]);
            } else {
                SideSliderImage::where('id', $id)->update(['active' => 1]);
            }
            return redirect(route('side_slider_images'))->with('success', true);
        }
        return view('dashboard.images.side_slider_images');
    }



}
