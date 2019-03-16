<?php

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

Route::get('/',[
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index'
]);
/*
Route::get('/',[
    'uses'=>'ProductController@getPiece',
    'as' => 'product.index'
]);
*/

Route::get('/add-to-card/{id}',[ 
	'uses' => 'ProductController@getAddToCart',
	'as' => 'product.addToCart'
]);

Route::get('/shopping-cart',[ 
	'uses' => 'OrderController@getCart',
	'as' => 'product.shoppingCart'
]);

Route::get('/checkout',[ 
	'uses' => 'OrderController@getCheckout',
	'as' => 'checkout'
]);
Route::get('/reduce/{id}',[ 
	'uses' => 'OrderController@getReduceByOne',
	'as' => 'product.reduceByOne'
]);

Route::get('/remove/{id}',[ 
	'uses' => 'OrderController@getRemoveItem',
	'as' => 'product.remove'
]);

Route::get('/checkoutBuy',[ 
	'uses' => 'OrderController@checkoutProduct',
	'as' => 'product.buyPro'
]);
//Admin Page
Route::get('/admin',[
    'uses' => 'AdminController@openAdmin',
    'as' => 'product.admin'
]);

Route::post('/admin/check',[
    'uses' => 'AdminController@check',
    'as' => 'product.adminCheck'
]);

Route::get('/adminPage',[
    'uses' => 'AdminController@openAdminPage',
    'as' => 'product.adminPage'
]);

Route::get('/SignUp',[
    'uses' => 'RegistrController@signup',
    'as' => 'product.signUp'
]);

Route::get('/signIn', [
    'uses'=>'RegistrController@index',
    'as'=>'product.signin'
]);

Route::post('/signIn/checklogin', 'SessionController@store');

Route::post('/signUp/addToDB','RegistrController@getToDB');

Route::get('signIn/logout/{id}', 'ProductController@logout');

Route::get('/profile/{id}',[
    'uses'=>'RegistrController@getProfile',
    'as'=> 'product.profile'
]);

Route::post('/profile/{id}','ProfileUpdateController@edit');

Route::get('/logout', [
    'uses'=>'SessionController@destroy',
    'as'=> 'product.logout'
]);