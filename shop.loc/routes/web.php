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




Route::match(['get'],'/products/{category?}',['uses'=>'ProductController@execude','as'=>'products']);

Route::match(['get'],'/product/{code}',['uses'=>'ProductController@product','as'=>'product']);

Route::match(['post'],'/search',['uses'=>'ProductController@search','as'=>'search']);

Route::match(['get'],'/search/{word}',['uses'=>'ProductController@search_get','as'=>'search_get']);

Route::match(['get'],'/basket',['uses'=>'BasketController@execude','as'=>'basket']);

Route::match(['post'],'/basket',['uses'=>'BasketController@add_basket','as'=>'add_basket']);

Route::match(['post'],'/update_basket',['uses'=>'BasketController@update_basket','as'=>'update_basket']);

Route::match(['get'],'/basket/delete/{id}',['uses'=>'BasketController@delete_basket','as'=>'delete_basket']);

Route::match(['get'],'/basket/empty',['uses'=>'BasketController@empty_basket','as'=>'empty_basket']);

Route::match(['get'],'/fill',['uses'=>'BasketController@fill','as'=>'fill']);

Route::match(['post'],'/send',['uses'=>'mailController@send','as'=>'send']);

Route::post('/comment/store', 'CommentsController@store')->name('comment.add');
Route::post('/reply/store', 'CommentsController@replyStore')->name('reply.add');


Auth::routes();

////////////////////
Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);
Route::match(['get','post'],'logoutadmin', [
  'as' => 'logoutadmin',
  'uses' => 'AdminLogInController@logoutadmin'
]);


Route::post('/admin/check',[
    'uses' => 'AdminLogInController@check',
    'as' => 'adminCheck'
]);
Route::get('/admin',[
    'uses' => 'AdminLogInController@open',
    'as' => 'admin'
]);
Route::get('/adminPage',[
    'uses' => 'AdminLogInController@show',
    'as' => 'adminPage'
]);
///////////////////

Route::get('/home', 'HomeController@index')->name('home');

	//admin/pages
	Route::group(['prefix'=>'contents'],function(){
		//admin/pages
		Route::get('/',['uses'=>'ContentsController@execute','as'=>'contents']);

		//admin/pages/add
		Route::match(['get','post'],'/add',['uses'=>'ContentAddController@execute','as'=>'contentAdd']);

		//admin/edit/2
		Route::match(['get','post','delete'],'/edit{content}',['uses'=>'ContentEditController@execute','as'=>'contentEdit']);
	});	

  //////////


Route::match(['get'],'/profile',['uses'=>'ProductController@profile','as'=>'profile']);


Route::match(['get'],'/profile2',['uses'=>'ProductController@profile2','as'=>'profile2']);

Route::match(['get'],'/profile3/{created_at}',['uses'=>'ProductController@profile3','as'=>'profile3']);

Route::match(['get'],'/set1',['uses'=>'ProductController@set1','as'=>'set1']);

Route::post('/profile/{id}',['uses'=>'ProfileUpdateController@edit','as'=>'updateProfile']);

Route::match(['post'],'/delete_comment',['uses'=>'CommentsController@delete','as'=>'delete_comment']);







