<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request){
        $customer=$request->session()->get('customer');
        if ($customer) {
            $sliders = Product::where('slider', 1)->get();
            $categories = Category::where('status', 1)->get();
            $subcategories = SubCategory::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();
            $products = Product::all();
//        return $sliders;
            return view('FrontEnd.Home.Home', [
                'sliders' => $sliders,
                'categories' => $categories,
                'subcategories' => $subcategories,
                'brands' => $brands,
                'products' => $products,
                'customer' => $customer
            ]);
        }else{
            $sliders = Product::where('slider', 1)->get();
            $categories = Category::where('status', 1)->get();
            $subcategories = SubCategory::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();
            $products = Product::all();
//        return $sliders;
            return view('FrontEnd.Home.Home', [
                'sliders' => $sliders,
                'categories' => $categories,
                'subcategories' => $subcategories,
                'brands' => $brands,
                'products' => $products,
                'customer' => $customer

            ]);
        }
    }

    public function showProduct($id,Request $request){
        $customer=$request->session()->get('customer');
        if ($customer) {
            $sliders = Product::where('slider', 1)->get();
            $categories = Category::where('status', 1)->get();
            $subcategories = SubCategory::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();
            $products = Product::where('sub_cat_id', $id)->get();
            return view('FrontEnd.Home.Home', [
                'sliders' => $sliders,
                'categories' => $categories,
                'subcategories' => $subcategories,
                'brands' => $brands,
                'products' => $products,
                'customer' => $customer
            ]);
        }else{
            $sliders = Product::where('slider', 1)->get();
            $categories = Category::where('status', 1)->get();
            $subcategories = SubCategory::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();
            $products = Product::where('sub_cat_id', $id)->get();
            return view('FrontEnd.Home.Home', [
                'sliders' => $sliders,
                'categories' => $categories,
                'subcategories' => $subcategories,
                'brands' => $brands,
                'products' => $products,
                'customer' => $customer
            ]);
        }
    }
    public function productDetails($id,Request $request){
        $customer=$request->session()->get('customer');
        if ($customer) {
            $cart= Cart::where('user_id',$customer->id)->count();
            $sliders = Product::where('slider', 1)->get();
            $categories = Category::where('status', 1)->get();
            $subcategories = SubCategory::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();
            $products = Product::where('sub_cat_id', $id)->get();
            $product1 = Product::with('category', 'sub_category', 'sub_sub_category', 'brand', 'productGallery')->find($id);
//        return $product1;


                return view('FrontEnd.product_details.product_details', [
                    'sliders' => $sliders,
                    'categories' => $categories,
                    'subcategories' => $subcategories,
                    'brands' => $brands,
                    'products' => $products,
                    'product' => $product1,
                    'customer' => $customer,
                    'cart'  => $cart

                ]);

        }else{
//            $cart= Cart::where('user_id',$customer->id)->count();
            $sliders = Product::where('slider', 1)->get();
            $categories = Category::where('status', 1)->get();
            $subcategories = SubCategory::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();
            $products = Product::where('sub_cat_id', $id)->get();
            $product1 = Product::with('category', 'sub_category', 'sub_sub_category', 'brand', 'productGallery')->find($id);
//        return $product;

            return view('FrontEnd.product_details.product_details', [
                'sliders' => $sliders,
                'categories' => $categories,
                'subcategories' => $subcategories,
                'brands' => $brands,
                'products' => $products,
                'product' => $product1,
                'customer' => $customer,
                'cart' => 0
            ]);
        }
    }


}
