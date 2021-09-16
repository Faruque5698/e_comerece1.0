<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Sub_sub_category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];

            $products = Product::with('category','sub_category','sub_sub_category','brand')->get();

//            return $sub_categories;

            return view('adminPanel.Products.product_list',[
                'products' => $products

            ],$data);
        }
    }

    public function add_product(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];

            $categories = Category::where('status',1)->get();
            $brands = Brand::where('status',1)->get();

//            return $sub_categories;

            return view('adminPanel.Products.add_product',[
                'categories' => $categories,
                'brands' => $brands

            ],$data);
        }
    }

    public function getSubCat(Request $request){
        $data = SubCategory::select('sub_cat_name','id')->where('cat_id',$request->id)->get();
//        return $data;
        return response()->json($data);
    }

    public function getsubSubCat(Request $request){
        $data = Sub_sub_category::select('sub_sub_cat_name','id')->where('sub_cat_id',$request->id)->get();
//        return $data;
        return response()->json($data);
    }

    public function save_product(Request $request){

        $product_image = $request->file('product_image');
        $imageName = $product_image->getClientOriginalName();
        $directory = 'admin/admin/images/product_image/';
        $imageUrl = $directory.$imageName;
        $product_image->move($directory, $imageName);

        $product = new Product();
        $product->cat_id = $request->cat_id;
        $product->brand_id = $request->brand_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->sub_sub_cat_id = $request->sub_sub_cat_id;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_discount = $request->product_discount;
        $product->product_discount_type = $request->product_discount_type;
        $product->product_discount_price = $request->product_discount_price;
        $product->product_image = $imageUrl;
        $product->slider = $request->slider;
        $product->status = $request->status;
        $product->save();

        $galleryImage = $request->file('product_gallery_image');
        foreach ($galleryImage as $gallery){

            $imageName = $gallery->getClientOriginalName();
            $directory = 'admin/admin/images/product_gallery_image/';
            $imageUrl2 = $directory.$imageName;
            $gallery->move($directory, $imageName);

            $product_gallery = new ProductGallery();
            $product_gallery->product_id=$product->id;
            $product_gallery->product_gallery_image = $imageUrl2;
            $product_gallery->save();

        }


        return redirect('products')->with('message','Product Added');

    }

    public function product_details($id){
        if (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];

            $product = Product::with('category', 'sub_category', 'sub_sub_category', 'brand', 'productGallery')->find($id);

//            return $sub_categories;

            return view('adminPanel.Products.product_details', [
                'product' => $product

            ], $data);
        }
    }

    public function edit_product($id){
        if (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];

            $categories = Category::where('status',1)->get();
            $brands = Brand::where('status',1)->get();
            $product = Product::with('category', 'sub_category', 'sub_sub_category', 'brand', 'productGallery')->find($id);

//            return $product;

            return view('adminPanel.Products.edit_product', [
                'product' => $product,
                'categories' => $categories,
                'brands' => $brands
//
            ], $data);
        }
    }

    public function update(Request $request){
        $product = Product::find($request->id);
        $product_image = $request->file('product_image');

        if ($product_image){
            unlink($product->product_image);

            $imageName = $product_image->getClientOriginalName();
            $directory = 'admin/admin/images/product_image/';
            $imageUrl = $directory.$imageName;
            $product_image->move($directory, $imageName);

            $product->cat_id = $request->cat_id;
            $product->brand_id = $request->brand_id;
            $product->sub_cat_id = $request->sub_cat_id;
            $product->sub_sub_cat_id = $request->sub_sub_cat_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_quantity = $request->product_quantity;
            $product->product_price = $request->product_price;
            $product->product_discount = $request->product_discount;
            $product->product_discount_type = $request->product_discount_type;
            $product->product_discount_price = $request->product_discount_price;
            $product->product_image = $imageUrl;
            $product->slider = $request->slider;
            $product->status = $request->status;
            $product->save();
        }
        else{
            $product->cat_id = $request->cat_id;
            $product->brand_id = $request->brand_id;
            $product->sub_cat_id = $request->sub_cat_id;
            $product->sub_sub_cat_id = $request->sub_sub_cat_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_quantity = $request->product_quantity;
            $product->product_price = $request->product_price;
            $product->product_discount = $request->product_discount;
            $product->product_discount_type = $request->product_discount_type;
            $product->product_discount_price = $request->product_discount_price;
            $product->slider = $request->slider;
            $product->status = $request->status;
            $product->save();
        }

        return redirect('/products')->with('message','Product Updated');


    }

    public function gallery_update($id){


        if (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];

            $gallery_image = ProductGallery::where('product_id','=',$id)->get();

//            return $product;

            return view('adminPanel.Products.edit_gallery', [
                'gallery_image' => $gallery_image
//
            ], $data);
        }

    }

    public function gallery_update_image(Request $request){
       $imgs = $request->product_gallery_image;

       foreach ($imgs as $id => $img){
           $image_delete=ProductGallery::findOrFail($id);
           unlink($image_delete->product_gallery_image);


           $imageName = $img->getClientOriginalName();
           $directory = 'admin/admin/images/product_gallery_image/';
           $imageUrl2 = $directory.$imageName;
           $img->move($directory, $imageName);

           ProductGallery::where('id',$id)->update([
                'product_gallery_image' => $imageUrl2
           ]);
       }

       return back();


    }

    public function published($id){
        $product = Product::find($id);
        $product->status = 1;
        $product->save();

        return back();
    }

    public function unpublished($id){
        $product = Product::find($id);
        $product->status = 0;
        $product->save();

        return back();
    }



    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        ProductGallery::where('product_id',$product->id)->delete();

        return back();
    }













}






