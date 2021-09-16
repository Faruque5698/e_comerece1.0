<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){

        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];

            $brands = Brand::all();

        return view('AdminPanel.Brands.brands_list',[
            'brands' => $brands
        ],$data);
        }
    }

    public function addBrand(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];

            return view('AdminPanel.Brands.Add_brand',$data);
        }
    }

    public function saveBrand(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands',
            'brand_image' => 'required|image',
            'status' => 'required'
        ]);

        $brand_image = $request->file('brand_image');
        $imageName = $brand_image->getClientOriginalName();
        $directory = 'admin/admin/images/brand-images/';
        $imageUrl = $directory.$imageName;
        $brand_image -> move($directory,$imageName);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_image=$imageUrl;
        $brand->status = $request->status;
        $brand->save();

        return back()->with('message','New Brand Added');


    }

    public function edit($id){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];

            $brand = Brand::find($id);

            return view('AdminPanel.Brands.Edit_brand',[
                'brand' => $brand
            ],$data);
        }


    }

    public function update(Request $request){
        $brand = Brand::find($request->id);
        $brand_image = $request->file('brand_image');

        if ($brand_image){

            unlink($brand->brand_image);
            $imageName = $brand_image->getClientOriginalName();
            $directory = 'admin/admin/images/brand-images/';
            $imageUrl = $directory.$imageName;
            $brand_image -> move($directory,$imageName);

            $brand->brand_name = $request->brand_name;
            $brand->brand_image=$imageUrl;
            $brand->status = $request->status;
            $brand->save();



        }else{
            $brand->brand_name = $request->brand_name;
            $brand->status = $request->status;
            $brand->save();



        }

        return redirect('brands')->with('message','Brand Updated Successfully');

    }


    public function unPublished($id){
        $brand = Brand::find($id);
        $brand->status = 0;
        $brand -> save();
        return back();
    }
    public function published($id){
        $brand = Brand::find($id);
        $brand->status = 1;
        $brand -> save();
        return back();
    }

    public function delete($id){

        $brand = Brand::find($id);
        unlink($brand->brand_image);
        $brand->delete();

        return back();
    }
}
