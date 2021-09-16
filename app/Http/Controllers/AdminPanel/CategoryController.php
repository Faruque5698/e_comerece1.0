<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
            $categories = Category::all();
            return view('adminPanel.category.category',[
                'categories' => $categories
            ],$data);
        }

    }

    public function addCategory(){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
            return view('adminPanel.category.addCategory',$data);
        }
    }

    public function saveCategory(Request $request){

//        $request->validate([
//            'cat_name'=>'required',
//            'description'=>'required',
//            'status'=>'required'
//        ]);


        $cat_image = $request->file('cat_image');
        $imageName = $cat_image->getClientOriginalName();
        $directory = 'admin/admin/images/category-images/';
        $imageUrl = $directory.$imageName;
        $cat_image->move($directory, $imageName);

        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->description = $request->description;
        $category->cat_image = $imageUrl;
        $category->status = $request->status;

        $category->save();

        return back()->with('message','Category saved Successfully');


    }

    public function editCategory($id){
        if (session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
            $categories = Category::find($id);
            return view('adminPanel.category.editCategory',[
                'categories' => $categories
            ],$data);
        }

    }


    public function updateCategory(Request $request){

        $category = Category::find($request->id);
        $cat_image = $request->file('cat_image');

        if ($cat_image) {

            unlink($category->cat_image);

            $imageName = $cat_image->getClientOriginalName();
            $directory = 'admin/admin/images/category-images/';
            $imageUrl = $directory . $imageName;
            $cat_image->move($directory, $imageName);

            $category->cat_name = $request->cat_name;
            $category->description = $request->description;
            $category->cat_image = $imageUrl;
            $category->status = $request->status;

            $category->save();
        }else{
            $category->cat_name = $request->cat_name;
            $category->description = $request->description;
            $category->status = $request->status;

            $category->save();
        }

        return redirect('/category')->with('message','Category Updated');
    }




    public function unpublishCategory($id){
        $category = Category::find($id);
        $category->status = 0;
        $category->save();

        return back()->with('message','Category saved Successfully');
    }

    public function publishCategory($id){
        $category = Category::find($id);
        $category->status = 1;
        $category->save();

        return back();
    }

    public function delete($id){
        $category = Category::find($id);
        unlink($category->cat_image);
        $category->delete();

        return back()->with('message','Category saved Successfully');
    }

}
