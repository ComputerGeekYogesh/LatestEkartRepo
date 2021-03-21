<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RegisteredController;


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

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes(); //*Auth::routes() is a helper class that helps you generate all the routes required for user authentication.

Route::get('collection','App\Http\Controllers\Frontend\CollectionController@index');


//* Frontend Routes
Route::get('collection/{group_url}','App\Http\Controllers\Frontend\CollectionController@groupview');
Route::get('collection/{group_url}/{cate_url}','App\Http\Controllers\Frontend\CollectionController@categoryview');
Route::get('collection/{group_url}/{cate_url}/{subcate_url}','App\Http\Controllers\Frontend\CollectionController@subcategoryview');
Route::get('collection/{group_url}/{cate_url}/{subcate_url}/{prod_url}','App\Http\Controllers\Frontend\CollectionController@productview');

Route::group (['middleware' => ['auth','isUser']], function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/my-profile','App\Http\Controllers\Frontend\UserController@myprofile');
    Route::post('my-profile-update','App\Http\Controllers\Frontend\UserController@myprofileupdate');
    });

Route::group (['middleware' => ['auth','isAdmin']], function (){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/registered-user','App\Http\Controllers\Admin\RegisteredController@index');
    Route::get('role-edit/{id}','App\Http\Controllers\Admin\RegisteredController@edit');
    Route::put('role-update/{id}','App\Http\Controllers\Admin\RegisteredController@updaterole');

    //Group Routes
    Route::get('group','App\Http\Controllers\Admin\GroupController@index');
    Route::get('group-add','App\Http\Controllers\Admin\GroupController@viewpage');
    Route::post('group-store','App\Http\Controllers\Admin\GroupController@store');
    Route::get('group-edit/{id}','App\Http\Controllers\Admin\GroupController@edit');
    Route::put('group-update/{id}','App\Http\Controllers\Admin\GroupController@update');
    Route::get('group-delete/{id}','App\Http\Controllers\Admin\GroupController@delete');
    Route::get('group-deleted-records','App\Http\Controllers\Admin\GroupController@deletedrecords');
    Route::get('group-re-store/{id}','App\Http\Controllers\Admin\GroupController@deletedrestore');

    // Category Routes
    Route::get('category','App\Http\Controllers\Admin\CategoryController@index');
    Route::get('category-add','App\Http\Controllers\Admin\CategoryController@create');
    Route::post('/category-store','App\Http\Controllers\Admin\CategoryController@store');
    Route::get('category-edit/{id}','App\Http\Controllers\Admin\CategoryController@edit');
    Route::put('category-update/{id}','App\Http\Controllers\Admin\CategoryController@update');
    Route::get('category-delete/{id}','App\Http\Controllers\Admin\CategoryController@delete');
    Route::get('category-deleted-records','App\Http\Controllers\Admin\CategoryController@deletedrecords');
    Route::get('category-re-store/{id}','App\Http\Controllers\Admin\CategoryController@deletedrestore');

    // Sub Category Routes
    Route::get('subcategory','App\Http\Controllers\Admin\SubcategoryController@index');
    Route::post('/sub-category-store','App\Http\Controllers\Admin\SubcategoryController@store');
    Route::get('subcategory-edit/{id}','App\Http\Controllers\Admin\SubcategoryController@edit');
    Route::put('sub-category-update/{id}','App\Http\Controllers\Admin\SubcategoryController@update');
    Route::get('subcategory-delete/{id}','App\Http\Controllers\Admin\SubcategoryController@delete');
    Route::get('subcategory-deleted-records','App\Http\Controllers\Admin\SubcategoryController@deletedrecords');
    Route::get('subcategory-re-store/{id}','App\Http\Controllers\Admin\SubcategoryController@deletedrestore');

    // Product Routes
    Route::get('product','App\Http\Controllers\Admin\ProductController@index');
    Route::get('add-products','App\Http\Controllers\Admin\ProductController@create');
    Route::post('/store-products','App\Http\Controllers\Admin\ProductController@store');
    Route::get('edit-products/{id}','App\Http\Controllers\Admin\ProductController@edit');
    Route::put('update-product/{id}','App\Http\Controllers\Admin\ProductController@update');
    Route::get('product-delete/{id}','App\Http\Controllers\Admin\ProductController@delete');
    Route::get('product-deleted-records','App\Http\Controllers\Admin\ProductController@deletedrecords');
    Route::get('product-re-store/{id}','App\Http\Controllers\Admin\ProductController@deletedrestore');
});

 Route::group (['middleware' => ['auth','isVendor']], function (){

        Route::get('/vendor-dashboard', function () {
            return view('vendor.dashboard');
        });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
