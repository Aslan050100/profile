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

Route::get('/signUp',[
    'uses'=>'SignUpController@getIndex',
    'as'=>'user.index'
]);

Route::post('/signUp/addToDB',[
    'uses'=>'SignUpController@getToDB',
    'as'=>'user.addToDB'
]);

Route::get('/logIn',[
    'uses'=>'LogInController@getIndex',
    'as'=>'user.logIn'
]);

Route::post('/logIn/checkLogin', ['uses'=>'LogInController@store','as'=>'user.checkLogin']);



Route::get('LogIn/logout/{id}', 'ProfileController@logout');

Route::match(['get','post'],'/search',['uses'=>'SearchController@searchProfile','as'=>'user.search']);

Route::get('/profile/{id}',[
    'uses'=>'ProfileController@getIndex',
    'as'=> 'user.profile'
]);


Route::match(['get','post'],'/profile/{id}',['uses'=>'ProfileController@getPost','as'=>'user.getPost']);

Route::post('/updateAvatar/profile/{id}','UpdateAvatarController@updateAvatar');

Route::match(['post'],'/add_new_post/profile/{id}',['uses'=>'AddPostController@add_post','as'=>'user.add']);

Route::match(['post','get'],'/delete_post/{id}',['uses'=>'ProfileController@delete_post','as'=>'user.deletePost']);


//Route::match(['post'],'/add_new_photo/profile/{id}',['uses'=>'AddPhotoController@add_photo','as'=>'user.addPhoto']);


Route::post('/profile/{id}','ChangePasswordController@changePassword');

Route::post('/settings/profile/{id}','ProfileSettingsController@edit');

Route::get('/settings',[
    'uses'=>'ProfileSettingsController@getIndex',
    'as'=>'user.settings'
]);

Route::get('/logout', [
    'uses'=>'LogInController@destroy',
    'as'=> 'user.logout'
]);



Route::get('/guest',['uses'=>'GuestController@show','as'=>'user.guest']);

Route::get('/guestProfile/{id}',['uses'=>'GuestProfileController@show','as'=>'user.guestProfile']);

Route::get('/searchFriends',['uses'=>'SearchController@searchFriends','as'=>'user.searchFriends']);

/////////////////////
Route::get('/friends',['uses'=>'FriendController@index','as'=>'user.friends'])->middleware('auth');

Route::match(['post'],'/addFriend',['uses'=>'FriendController@addFriend','as'=>'user.addFriend']);
Route::match(['post'],'/removeFriend',['uses'=>'FriendController@removeFriend','as'=>'user.removeFriend']);

//////////////
Route::match(['get','post'],'/chat/{id}',['uses'=>'ChatController@show','as'=>'user.chatShow'])->middleware('auth');
Route::match(['post'],'/chat/getChat',['uses'=>'ChatController@getChat','as'=>'user.getChat'])->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
