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

Route::prefix("admin")->namespace("Admin")->middleware(["auth","role:admin",'permissions'])->group(function(){

    Route::resource("categories",'CategoryController');
    Route::get("category/{id}",'CategoryController@status')->name("category.status");
    Route::resource("products",'ProductController');
    Route::resource("about",'AboutController');
    Route::resource("chif",'ChifController');

    Route::resource("blogs",'BlogController');
    Route::get('/blogs-pending/{id}','BlogController@pending')->name('blog.pending');
    Route::get('/blogs-confirm/{id}','BlogController@confirm')->name('blog.confirm');

    Route::resource("orders",'OrderController');
    Route::get("/users/{id}/status","UserController@status")->name('user.status');
    Route::resource("/contacts","ContactController");
    Route::resource("/contactUs","EmailController");
    Route::resource("/setting","SettingsController");
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

    //FrontEnd Sections Routs:
    Route::prefix("frontend")->namespace("frontend")->group(function(){
    Route::get("/home","HomeController@Home")->name('Home');
    Route::get("/about","HomeController@About")->name('About');
    Route::get("/menu","HomeController@Menu")->name('Menu');
    Route::get("/blog","HomeController@Blogs")->name('Blogs');
   // Route::get("/contact","HomeController@Contact")->name('Contact');
//    Route::post("/booktable","HomeController@BookTable")->name('BookTable');
   Route::post("/subscrip","HomeController@subscrip")->name('subscrip');
//        Route::post('/contacStore',"HomeController@store_contact")->name('addcontact');
});
Route::resource('/contact','ContactController');
Route::resource('/book','BookController');



