<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login\UserController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\SubCategoryController;
use App\Http\Controllers\AdminPanel\BrandController;
use App\Http\Controllers\AdminPanel\ProductController;
use App\Http\Controllers\AdminPanel\SubSubCategoryController;
use App\Http\Controllers\FrontEnd\FrontController;
use App\Http\Controllers\AdminPanel\SliderController;
use App\Http\Controllers\FrontEnd\CustomerUserController;
use App\Http\Controllers\AdminPanel\StockController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(["middleware"=>["isLogged"]],function (){

    Route::get('/dashboard',[UserController::class, 'dashboard']);

    //Admin Registration



    Route::get('/Admin-registration',[UserController::class,'register']);
    Route::post('/create',[UserController::class,'create'])->name('auth.create');
    Route::get('/Admin-Panel/list',[UserController::class,'admin_list']);
    Route::get('/admin_profile_edit/{id}',[UserController::class,'admin_profile_edit'])->name('admin_profile_edit');
    Route::get('/admin_profile_delete/{id}',[UserController::class,'admin_profile_delete'])->name('admin_profile_delete');
    Route::post('/admin_profile_update',[UserController::class,'admin_profile_update'])->name('admin_profile_update');


    //Slider

    Route::get('/slider',[SliderController::class,'index']);
    Route::get('/add-Slider',[SliderController::class,'add']);



    //category
    Route::get('/category',[CategoryController::class,'index']);
    Route::get('/add-category',[CategoryController::class,'addCategory']);
    Route::post('/save-category',[CategoryController::class,'saveCategory']);
    Route::get('/unpublished-category/{id}',[CategoryController::class,'unpublishCategory'])->name('unpublished-category');
    Route::get('/published-category/{id}',[CategoryController::class,'publishCategory'])->name('published-category');
    Route::get('/category-edit/{id}',[CategoryController::class,'editCategory'])->name('category-edit');
    Route::post('/update-category',[CategoryController::class,'updateCategory'])->name('update-category');
    Route::get('/delete-category/{id}',[CategoryController::class,'delete'])->name('delete-category');

    //Sub Category
    Route::get('/sub-category',[SubCategoryController::class,'index']);
    Route::get('/sub-category/create',[SubCategoryController::class,'create']);
    Route::post('/sub-category/save',[SubCategoryController::class,'save']);
    Route::get('/unpublished-sub_category/{id}',[SubCategoryController::class,'unpublished'])->name('unpublished-sub_category');
    Route::get('/published-sub_category/{id}',[SubCategoryController::class,'published'])->name('published-sub_category');
    Route::get('/sub_category-edit/{id}',[SubCategoryController::class,'edit'])->name('sub_category-edit');
    Route::post('/sub-category/update/',[SubCategoryController::class,'update']);
    Route::get('/delete-sub_category/{id}',[SubCategoryController::class,'delete'])->name('delete-sub_category');

    //sub sub category
     Route::get('/sub_sub_category',[SubSubCategoryController::class,'index']);
     Route::get('/sub_sub_category/create',[SubSubCategoryController::class,'create']);
     Route::post('/sub_sub_category/save',[SubSubCategoryController::class,'save']);
     Route::get('/sub_sub_category-edit/{id}',[SubSubCategoryController::class,'edit'])->name('sub_sub_category-edit');
     Route::post('/sub_sub_category-update',[SubSubCategoryController::class,'update']);
     Route::get('/unpublished_sub_sub_category/{id}',[SubSubCategoryController::class,'unpublished'])->name('unpublished_sub_sub_category');
     Route::get('/published_sub_sub_category/{id}',[SubSubCategoryController::class,'published'])->name('published_sub_sub_category');
     Route::get('/delete-sub_sub_category/{id}',[SubSubCategoryController::class,'delete'])->name('delete-sub_sub_category');


    //Brands
    Route::get('/brands',[BrandController::class,'index']);
    Route::get('/add-brand',[BrandController::class,'addBrand']);
    Route::post('/save-brand',[BrandController::class,'saveBrand']);
    Route::get('/unpublished-brand/{id}',[BrandController::class,'unPublished'])->name('unpublished-brand');
    Route::get('/published-brand/{id}',[BrandController::class,'published'])->name('published-brand');
    Route::get('/brand-edit/{id}',[BrandController::class,'edit'])->name('brand-edit');
    Route::post('/update-brand/',[BrandController::class,'update'])->name('update-brand');
    Route::get('/delete-Brand/{id}',[BrandController::class,'delete'])->name('delete-Brand');

    //Product
    Route::get('/products',[ProductController::class,'index']);
    Route::get('/add-product',[ProductController::class,'add_product']);
    Route::post('/save-product',[ProductController::class,'save_product']);
    Route::get('/product-details/{id}',[ProductController::class,'product_details'])->name("product_details");
    Route::get('/product_published/{id}',[ProductController::class,'published'])->name("product_published");
    Route::get('/product_unpublished/{id}',[ProductController::class,'unpublished'])->name("product_unpublished");
    Route::get('/product_edit/{id}',[ProductController::class,'edit_product'])->name("product_edit");
    Route::get('/product_delete/{id}',[ProductController::class,'deleteProduct'])->name("product_delete");

    Route::post('/product_update',[ProductController::class,'update']);
    Route::get('/gallery_update/{id}',[ProductController::class,'gallery_update'])->name("gallery_update");
    Route::post('/update-gallery-image',[ProductController::class,'gallery_update_image']);


    Route::get('/stock',[StockController::class,'index']);
    Route::get('/add-stock',[StockController::class,'add_stock']);
    Route::post('/save-stock',[StockController::class,'save_stock']);
    Route::get('/order_demo/{product_id}',[StockController::class,'order'])->name('order_demo');
    Route::get('/delete_stock/{id}',[StockController::class,'delete'])->name('delete_stock');
    Route::post('/order_demo_save',[StockController::class,'save_demo_order']);


    Route::get('/findPrice',[StockController::class,'findPrice']);




    //json Request


    Route::get('/findsubcategory',[ProductController::class,'getSubCat']);
    Route::get('/findsubsubcategory',[ProductController::class,'getsubSubCat']);



});


Route::group(["middleware"=>["isLoggedOut"]], function (){

    Route::get('/login',[UserController::class,'login']);
//    Route::get('/registration',[UserController::class,'register']);
});

//->middleware('isLogged');
//->middleware('isLoggedOut');
//->middleware('isLoggedOut');



Route::post('/check',[UserController::class,'check'])->name('auth.check');
Route::get('/logout',[UserController::class,'logout']);

//Route::get('/findsubcategory',[ProductController::class,'getSubCat']);
//Route::get('/findsubsubcategory',[ProductController::class,'getsubSubCat']);


//Front End

Route::get('/',[FrontController::class,'index']);
Route::get('/display_product/{id}',[FrontController::class,'showProduct'])->name('display_product');
Route::get('/productDetails/{id}',[FrontController::class,'productDetails'])->name('productDetails');


Route::post('/addToCart',[CartController::class,'addToCart'])->name('addToCart');
Route::get('/cart_list',[CartController::class,'cart_list']);
Route::get('/remove_cart/{id}',[CartController::class,'remove'])->name('remove_cart');
Route::get('order',[OrderController::class,'order_now']);

//Route for Login_Register

Route::get('/customer-login',[CustomerUserController::class,'userLoginRegister']);
Route::get('/customer_logout',[CustomerUserController::class,'logOut']);
Route::post('/hello',[CustomerUserController::class,'nahid'])->name('hello');
Route::post('/customer_register',[CustomerUserController::class,'register']);








