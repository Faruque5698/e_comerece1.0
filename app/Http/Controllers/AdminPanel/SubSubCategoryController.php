<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Sub_sub_category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function index(){
        if (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
            $sub_sub_categories = Sub_sub_category::with('sub_category')->get();
//            return $sub_sub_categories;
//
            return view('adminPanel.sub_sub_category.sub_sub_category',[
                'sub_sub_categories' => $sub_sub_categories
            ],$data);
        }

    }

    public function create(){
        if (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];

            $subCategories = SubCategory::where('status',1)->get();

            return view('adminPanel.sub_sub_category.Add_sub_sub_category',[
                'subCategories' => $subCategories
            ],$data);
        }
    }

    public function save(Request $request){
        $request->validate([
            'sub_cat_id' => 'regex:/^([0-9]+)$/',
            'sub_sub_cat_name' => 'required',
            'status' => 'regex:/^([0-9]+)$/'
        ]);

        $sub_sub_category = new Sub_sub_category();

        $sub_sub_category -> sub_cat_id = $request->sub_cat_id;
        $sub_sub_category -> sub_sub_cat_name = $request -> sub_sub_cat_name;
        $sub_sub_category -> status = $request -> status;
        $sub_sub_category->save();

        return back()->with('message','Sub Sub Category added successfully');
    }

    public function edit($id){
        if (session()->has('LoggedUser')) {
            $user = User::where('id', '=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
            $sub_sub_category = Sub_sub_category::find($id);
            $subCategories = SubCategory::where('status',1)->get();

            return view('adminPanel.sub_sub_category.Edit_sub_sub_category',[
                'sub_sub_category' => $sub_sub_category,
                'subCategories' => $subCategories
            ],$data);
        }
    }

    public function update(Request $request){
        $sub_sub_category = Sub_sub_category::find($request->id);

        $sub_sub_category -> sub_cat_id = $request->sub_cat_id;
        $sub_sub_category -> sub_sub_cat_name = $request -> sub_sub_cat_name;
        $sub_sub_category -> status = $request -> status;
        $sub_sub_category->save();

        return redirect('/sub_sub_category')->with('message','Sub Sub Category Updated');
    }


    public function unpublished($id){
        $sub_sub_category = Sub_sub_category::find($id);
        $sub_sub_category -> status = 0;
        $sub_sub_category->save();

        return back();
    }

    public function published($id){
        $sub_sub_category = Sub_sub_category::find($id);
        $sub_sub_category -> status = 1;
        $sub_sub_category->save();

        return back();
    }

    public function delete($id){
        $sub_sub_category = Sub_sub_category::find($id);
        $sub_sub_category->delete();

        return back();
    }

}
