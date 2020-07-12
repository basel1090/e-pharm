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

Route::prefix("admin")->namespace("Admin")->middleware(["auth","role:admin"/*,'permissions'*/])->group(function(){

    Route::resource("categories",'CategoryController');
    Route::get("category/{id}",'CategoryController@status')->name("category.status");
    Route::resource("brands",'BrandController');
    Route::resource("products",'ProductController');
    Route::resource("orders",'OrderController');
    Route::get("/users/{id}/permissions","UserController@permissions")->name('permissions');
    Route::post("/users/{id}/permissions","UserController@postPermissions")->name('permissions-post');
    Route::resource("users",'UserController');
    Route::get("/users/{id}/delete","UserController@destroy")->name('delete-user');
    Route::get("/order/{id}/delete","OrderController@destroy")->name('delete-order');

    Route::get('/order-done/{id}','OrderController@done')->name('order.done');
    Route::get('/order-pending/{id}','OrderController@pending')->name('order.pending');
    Route::get('/order-cancel/{id}','OrderController@cancel')->name('order.cancel');


    Route::get("/change-password",'UserController@changePassword')->name("change-password");
    Route::put("/change-password",'UserController@postChangePassword')->name("post-change-password");



    Route::get("no-access","HomeController@noAccess")->name("admin.no-access");
    Route::get("/","HomeController@index")->name("admin.home");


    Route::get('/order_status/approve/{id}','OrderController@approve')->name('order.approve');
    Route::get('/order_status/{id}','OrderController@cancel')->name('order.cancel');

});
