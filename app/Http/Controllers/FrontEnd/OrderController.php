<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order_now(Request $request){
        $customer=$request->session()->get('customer');

        if ($customer) {
            $sliders = Product::where('slider', 1)->get();
            $categories = Category::where('status', 1)->get();
            $subcategories = SubCategory::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();
            $user=$customer->id;
            $carts = Cart::where('product_id','=',$user);



            $products = DB::table('carts')
                ->join('products','carts.product_id','=','products.id')
                ->where('carts.user_id',$user)
                ->select('products.*','carts.*','carts.id as cartId')
                ->get();
            $total = DB::table('carts')
                ->join('products','carts.product_id','=','products.id')
                ->where('carts.user_id',$user)
                ->sum('carts.price');



//        return $products;
            return view('FrontEnd.order.order_now', [
                'sliders' => $sliders,
                'categories' => $categories,
                'subcategories' => $subcategories,
                'brands' => $brands,
                'customer' => $customer,
                'products' => $products,
                'carts' => $carts,
                'total' => $total
            ]);
        }else {
            $sliders = Product::where('slider', 1)->get();
            $categories = Category::where('status', 1)->get();
            $subcategories = SubCategory::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();

            $products = '';
            $carts = '';


//        return $sliders;
            return view('FrontEnd.order.order_now', [
                'sliders' => $sliders,
                'categories' => $categories,
                'subcategories' => $subcategories,
                'brands' => $brands,
                'customer' => $customer,
                'products' => $products,
                'carts' => $carts,
                'total' => ''

            ]);


        }
    }
}
