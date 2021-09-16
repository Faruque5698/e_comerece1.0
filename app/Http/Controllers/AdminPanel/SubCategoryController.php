<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];

            $sub_categories = SubCategory::with('category')->get();

//            return $sub_categories;

            return view('adminPanel.sub_category.sub_category',[
                'sub_categories' => $sub_categories

            ],$data);
        }
    }



    public function create(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];

            $categories = Category::where('status',1)->get();

            return view('adminPanel.sub_category.Add-sub_category',[
                'categories' => $categories

            ],$data);
        }
    }


    public function save (Request $request){

        $request->validate([
            'cat_id' => 'regex:/^([0-9]+)$/',
            'sub_cat_name' => 'required|alpha',
            'sub_cat_desc' => 'required',
            'status' => 'regex:/^([0-9]+)$/'
        ]);

        $sub_category = new SubCategory();

        $sub_category->cat_id = $request->cat_id;
        $sub_category->sub_cat_name = $request->sub_cat_name;
        $sub_category->sub_cat_desc = $request->sub_cat_desc;
        $sub_category->status = $request->status;
        $sub_category->save();

        return back()->with('message','Sub Category Added Successfully');


    }

    public function edit($id){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
            $categories = Category::all();
            $sub_categories = SubCategory::find($id);
            return view('adminPanel.sub_category.edit_Sub_Category',[
                'sub_categories' => $sub_categories,
                'categories' => $categories
            ],$data);
        }
    }

    public function update(Request $request){

        $sub_category = SubCategory::find($request->id);

        $sub_category->cat_id = $request->cat_id;
        $sub_category->sub_cat_name = $request->sub_cat_name;
        $sub_category->sub_cat_desc = $request->sub_cat_desc;
        $sub_category->status = $request->status;
        $sub_category->save();

        return redirect('sub-category')->with('message','Sub Category Updated');

    }


    public function unpublished($id){
        $sub_category = SubCategory::find($id);
        $sub_category->status = 0;
        $sub_category->save();

        return back();
    }
    public function published($id){
        $sub_category = SubCategory::find($id);
        $sub_category->status = 1;
        $sub_category->save();

        return back();
    }


    public function delete($id){
        $sub_category = SubCategory::find($id);
        $sub_category->delete();

        return back();
    }



}
