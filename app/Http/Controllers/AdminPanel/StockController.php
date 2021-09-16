<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];

//            $sub_categories = SubCategory::with('category')->get();

//            return $sub_categories;

            $stocks = Stock::with('products')->get();
//return $stocks;
            return view('adminPanel.Stock.Stock',[
                'stocks' => $stocks
            ],$data);
        }
    }
    public function add_stock(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];

            $products = Product::all();

//            $sub_categories = SubCategory::with('category')->get();

//            return $sub_categories;

            return view('adminPanel.Stock.add-Stock',[
                'products' => $products
            ],$data);
        }
    }

    public function save_stock(Request $request){
        $request->validate([
            'product_id' => 'regex:/^([0-9]+)$/',

        ]);

        $stock = new Stock();
        $stock->product_id = $request->product_id;
        $stock->total_product_quantity = $request->total_product_quantity;
        $stock->order_product_quantity = 0;
        $stock->save();

        return redirect('/stock')->with('message','New Product Stock Added');
    }
    public function findPrice(Request $request){
        $data = Product::select('product_quantity')->where('id',$request->id)->first();
//        return $data;
        return response()->json($data);
    }

    public function order($id){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];

            $products = Product::all();

//            $sub_categories = SubCategory::with('category')->get();

//            return $sub_categories;
            $stock = Stock::where('product_id','=',$id)->first();
            $products= Product::find($id);
//return $products;
            return view('adminPanel.Stock.order_demo',[
                'stock' =>$stock,
                'products' => $products
            ],$data);
        }


    }

    public function save_demo_order(Request $request){
        $stock =Stock::find($request->id);
//        return $stock;
        $stock->total_product_quantity=$request->total_product_quantity;
        $stock->order_product_quantity=$request->order_product_quantity;
        $stock->save();
        return redirect('/stock')->with('message','Stock Updated');

    }



     public function delete($id){
        $stock = Stock::find($id);
        $stock->delete();
        return back();
     }
}
