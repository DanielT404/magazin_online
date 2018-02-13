<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Length;
use App\Models\Color;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    /**
     * Show all the products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
       $products = Product::all();
       $categories = Category::all();
       $lengths = Length::all();
       $colors = Color::all();




       $category_id = intval($request->input('category'));
       $subcategory_id = intval($request->input('subcategory'));
       $length_id = intval($request->input('length'));
       $color_id = intval($request->input('color'));
       $minPrice = intval($request->input('minPrice'));
       $maxPrice = intval($request->input('maxPrice'));
       

       $maxPriceVal = 1;
       $minPriceVal = 1;


       if($request->has('minPrice')) {
           $minPriceVal = $request->input('minPrice');
       }

       if($request->has('maxPrice')) {
        $maxPriceVal = $request->input('maxPrice');
    }

       if(!$category_id && !$subcategory_id && !$length_id && !$minPrice && !$maxPrice && !$color_id ) 
       {
        return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && !$subcategory_id && !$length_id && !$color_id && !$minPrice && !$maxPrice) 
       {
           $products = Product::where('category_id', '=', $category_id)->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]); 
       }
       elseif(!$category_id && !$subcategory_id && !$length_id && !$color_id && $minPrice && !$maxPrice)
       {
           $products = Product::where('price', '>', $minPrice)->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif(!$category_id && !$subcategory_id && !$length_id && !$color_id && !$minPrice && $maxPrice)
       {
           $products = Product::where('price', '<', $maxPrice)->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && !$length_id && !$color_id && !$minPrice && !$maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
        
       elseif($category_id && !$subcategory_id && $length_id && !$color_id && !$minPrice && !$maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('length_id', '=', $length_id)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && !$subcategory_id && !$length_id && $color_id && !$minPrice && !$maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('color_id', '=', $color_id)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && !$subcategory_id && !$length_id && !$color_id && $minPrice && !$maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('price', '>', $minPrice)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && !$subcategory_id && !$length_id && !$color_id && !$minPrice && $maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('price', '<', $maxPrice)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif(!$category_id && !$subcategory_id && !$length_id && !$color_id && $minPrice && $maxPrice)
       {
           $products = Product::where('price', '<', $maxPrice)
               ->where('price', '>', $minPrice)
               ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && $length_id && !$color_id && !$minPrice && $maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->where('length_id', '=', $length_id)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && !$subcategory_id && !$length_id && !$color_id && $minPrice && $maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
               ->where('price', '>', $minPrice)
               ->where('price', '<', $maxPrice)
               ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && !$length_id && $color_id && !$minPrice && $maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->where('color_id', '=', $color_id)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && !$length_id && !$color_id && $minPrice && !$maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->where('price', '>', $minPrice)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && !$length_id && !$color_id && !$minPrice && $maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->where('price', '<', $maxPrice)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && $length_id && !$color_id && !$minPrice && !$maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->where('length_id', '=', $length_id)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && !$length_id && !$color_id && $minPrice && $maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->where('price', '>', $minPrice)
                                ->where('price', '<', $maxPrice)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && $length_id && $color_id && !$minPrice && !$maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->where('length_id', '=', $length_id)
                                ->where('color_id', '=', $color_id)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && $length_id && $color_id && !$minPrice && $maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->where('length_id', '=', $length_id)
                                ->where('color_id', '=', $color_id)
                                ->where('price', '<', $maxPrice)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && $length_id && !$color_id && $minPrice && !$maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->where('length_id', '=', $length_id)
                                ->where('color_id', '=', $color_id)
                                ->where('price', '<', $maxPrice)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && $length_id && $color_id && $minPrice && !$maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->where('length_id', '=', $length_id)
                                ->where('color_id', '=', $color_id)
                                ->where('price', '>', $minPrice)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($category_id && $subcategory_id && $length_id && $color_id && $minPrice && $maxPrice)
       {
           $products = Product::where('category_id', '=', $category_id)
                                ->where('subcategory_id', '=', $subcategory_id)
                                ->where('length_id', '=', $length_id)
                                ->where('color_id', '=', $color_id)
                                ->where('price', '>', $minPrice)
                                ->where('price', '<', $maxPrice)
                                ->get();
           return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
       }
       elseif($request->input('option')) {
           if($request->input('option') == 'manual') {
               $products = Product::where('featured', '=', 1)->get();
               return view('product.index', ['products' => $products, 'categories' => $categories, 'lengths' => $lengths, 'colors' => $colors, 'minPriceVal' => $minPriceVal, 'maxPriceVal' => $maxPriceVal]);
           }
       }
    }


    public function findProduct($slug)
    {
        $product = Product::where('slug', $slug)->get();
        $categories = Category::all();
        return view('product.showProduct', ['product' => $product, 'categories' => $categories]);
    }



}
