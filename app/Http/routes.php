<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::post("/addMenuCategory","RestaurantController@addMenuCategory");
Route::post("editMenuCategory","RestaurantController@editMenuCategory");
Route::post("/addMenuItem","RestaurantController@addMenuItem");
Route::post("/updateRestaurantBasicDetail","RestaurantController@updateRestaurantBasicDetail");
Route::post("/updateRestaurantMenuDetail","RestaurantController@updateRestaurantMenuDetail");
Route::get('/removeMenuItem', 'RestaurantController@removeMenuItem');
Route::get('/removeMenuCategory', 'RestaurantController@removeMenuCategory');

/* Login related routes */
Route::get('/auth/login', array('as' => 'login' ,'uses' => 'Auth\AuthController@showLogin'));
Route::post('/auth/verify',"Auth\AuthController@doLogin");
Route::get('/logout', function() {
	   Auth::logout();
       return Redirect::to('/auth/login');
});

Route::group(array('before' => 'auth'), function() { 
	Route::get('/', 'WelcomeController@index');
	Route::post("/addRestaurant","RestaurantController@addRestaurant");
	Route::get("/addRestaurantPanel","RestaurantController@addRestaurantPanel");
	Route::get("/manageRestaurantPanel","RestaurantController@showManageRestaurantPanel");

});

Route::filter('auth',function(){
	if(Auth::guest()){
		return Redirect::route("login");
	}
});