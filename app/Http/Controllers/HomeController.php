<?php

namespace App\Http\Controllers;

use App\Models\BrandImage;
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
        $brand_images = BrandImage::where('active', 1)->get();
        return view('front.index', [
            'products' => $featured_products,
            'recentProducts' => $recent_products,
            'sliderImages' => $slider_images,
            'sideSliderImages' => $side_slider_images,
            'brandImages' => $brand_images,
            'categories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutUs()
    {
        $categories = Category::all();
        return view('front.despreNoi', ['categories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        $categories = Category::all();
        return view('front.contact', ['categories' => $categories]);
    }
}
