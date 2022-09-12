<?php

use Illuminate\Support\Facades\Route;
use App\Models\Meal;
use App\Http\Controllers;
use App\Http\Controllers\UserControllerAPI;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripePaymentController;
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
Route::get("/",[\App\Http\Controllers\HomeController::class,'index'])->name('home');

 
Route::get('/add-to-cart/{id}',['uses'=>'App\Http\Controllers\ProductController@getAddToCart','as'=>'Product.addToCart']);
Route::get('/shopping-cart/{id}',['uses'=>'App\Http\Controllers\ProductController@getCart','as'=>'Product.shoppingCart']);
Route::get('/myCart',['uses'=>'App\Http\Controllers\ProductController@MyCart','as'=>'Product.MyCart']);
Route::get('/myCart-del/{id}',['uses'=>'App\Http\Controllers\ProductController@product_del','as'=>'product.del']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 

Route::group(['prefix'=>'menu' ],function(){
    Route::get('/',['uses'=>'App\Http\Controllers\menuController@showMeal','as'=>'Meals.Get']);
//    Route::get('/','App\Http\Controllers\menuController@showMeal');
});

Route::get('/history/{id}', ['App\Http\Controllers\historyController', 'getOrders'])->name(
    'history'
);

Route::patch('{id}/feedback', ['App\Http\Controllers\historyController', 'feedback']);
Route::get('stripe',[StripePaymentController::class , 'stripe']);
Route::post('stripe',[StripePaymentController::class , 'stripepost'])->name('stripe.post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function (){
    Route::get('/' , [\App\Http\Controllers\Admin\AdminController::class , 'index'])->name('index');
    Route::get('/details' , [\App\Http\Controllers\Admin\AdminController::class , 'edit_contacts_info'])->name('details');
    Route::get('/about' , [\App\Http\Controllers\Admin\AdminController::class , 'edit_about'])->name('about');
    Route::get('/details/edit/{id}' , [\App\Http\Controllers\Admin\AdminController::class , 'update'])->name('update_details');
    Route::put('update-data/{id}' ,  [\App\Http\Controllers\Admin\AdminController::class , 'edit']);
    Route::get('/about/edit/{id}' , [\App\Http\Controllers\Admin\AdminController::class , 'update_about'])->name('update_about');
    Route::put('update-about/{id}' ,  [\App\Http\Controllers\Admin\AdminController::class , 'about']);
    Route::get('/alluser',[\App\Http\Controllers\Admin\AdminController::class, 'allusers' ])->name('allusers');
    Route::get('suspend/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'suspend' ]);


    Route::get('menu/create','App\Http\Controllers\menuController@create');
    Route::post('menu/store','App\Http\Controllers\menuController@store');
    Route::get('menu/addType','App\Http\Controllers\menuController@addType');
    Route::post('menu/storeType','App\Http\Controllers\menuController@storeType');
    Route::get('menu/{meal:id}/edit','App\Http\Controllers\menuController@edit');
    Route::patch('menu/{meal:id}/update','App\Http\Controllers\menuController@update');
    Route::get('menu/{meal:id}/delete','App\Http\Controllers\menuController@delete');
    Route::delete('menu{meal:id}/destroy', 'App\Http\Controllers\menuController@destroy');
    Route::get('menu/{type:id}/deleteType','App\Http\Controllers\menuController@deleteType');
    Route::delete('menu/{type:id}/destroyType', 'App\Http\Controllers\menuController@destroyType');
    Route::get('menu/{id?}','App\Http\Controllers\menuController@showMealAdmin');

 }); 
 

Route::get('/profile',[UserControllerAPI::class,'viewProfile']);

Route::get('/profile/edit',[UserControllerAPI::class,'editProfile']);

Route::post('/profile/edit',[UserControllerAPI::class,'updateProfile']);

Route::get('/cart',function (){
    return view('Cart');
});



require __DIR__.'/auth.php';
