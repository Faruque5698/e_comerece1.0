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
use MongoDB\Driver\Session;

class CartController extends Controller
{
    public function addToCart(Request $request){
//        return $request->all();
        $customer=$request->session()->get('customer');
        if ($customer) {

            //save Product in cart
            $cart = new Cart();

            $cart->user_id = $customer->id;
            $cart->product_id = $request->product_id;
            $cart->quanity = $request->quantity;
            $cart->price = $request->product_price;
            $cart->save();

            return back();

        }
        else{
            return redirect('customer-login')->with('success','Login First');
        }
    }

    static function cartItem(Request $request){
        $customer=$request->session()->get('customer');
        $customer_id = $customer->id;
        $count  = Cart::where('user_id',$customer_id)->count();
        return back()->with('total',$count);
    }

    public function cart_list(Request $request){
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



//        return $products;
            return view('FrontEnd.cart.cart_list', [
                'sliders' => $sliders,
                'categories' => $categories,
                'subcategories' => $subcategories,
                'brands' => $brands,
                'customer' => $customer,
                'products' => $products,
                'carts' => $carts
            ]);
        }else{
            $sliders = Product::where('slider', 1)->get();
            $categories = Category::where('status', 1)->get();
            $subcategories = SubCategory::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();

            $products= '';
            $carts = '';


//        return $sliders;
            return view('FrontEnd.cart.cart_list', [
                'sliders' => $sliders,
                'categories' => $categories,
                'subcategories' => $subcategories,
                'brands' => $brands,
                'customer' => $customer,
                'products' => $products,
                'carts' => $carts

            ]);
        }

    }
    public function remove($id){
        $product = Cart::find($id);

        $product->delete();

        return back();
    }

}
