<?php

namespace App\Http\Controllers;

use App\Models\Category as Category;
use App\Models\Product as Product;
use App\Models\SideSliderImage;
use App\Models\SliderImage;
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
        $slider_images = SliderImage::where('active', 1)->get();
        $side_slider_images = SideSliderImage::where('active', 1)->get();
        $categories = Category::all();
        $recent_products = Product::orderBy('created_at', 'desc')->take(10)->get();
        return view('front.index', [
            'products' => $featured_products,
            'recentProducts' => $recent_products,
            'sliderImages' => $slider_images,
            'sideSliderImages' => $side_slider_images,
            'categories' => $categories]);
    }
}
