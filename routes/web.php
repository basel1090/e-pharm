<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("admin")->middleware(["auth"/*,'permissions'*/])->group(function(){

    Route::resource("categories",'Admin\CategoryController');
    Route::resource("brands",'Admin\BrandController');
    Route::resource("products",'Admin\ProductController');
    Route::resource("orders",'Admin\OrderController');
    Route::get("/users/{id}/permissions","Admin\UserController@permissions")->name('permissions');
    Route::post("/users/{id}/permissions","Admin\UserController@postPermissions")->name('permissions-post');
    Route::resource("users",'Admin\UserController');
    Route::get("/users/{id}/delete","Admin\UserController@destroy")->name('delete-user');

//    Route::get('/active/{id}','CommentController@status')->name('comment.status');

    Route::get("/change-password",'Admin\UserController@changePassword')->name("change-password");
    Route::put("/change-password",'Admin\UserController@postChangePassword')->name("post-change-password");


    Route::get("no-access","HomeController@noAccess")->name("admin.no-access");
    Route::get("/","HomeController@index")->name("admin.home");


    Route::get('/order_status/approve/{id}','Admin\OrderController@approve')->name('order.approve');
    Route::get('/order_status/{id}','Admin\OrderController@cancel')->name('order.cancel');
});
