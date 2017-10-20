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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['prefix' => '','namespace' => 'Auth'],function(){
	
	Route::get('/', function () {
		return redirect('login');
	});

    // Authentication Routes...
    Route::get('/', 'LoginController@showLoginForm')->name('login');
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
	
	/*
	// Registration Routes...
	$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	$this->post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
	
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
    Route::post('password/reset', 'ResetPasswordController@reset');
	*/
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
	Route::resource('users', 'UsersController');
	Route::resource('lot-groups', 'LotGroupsController');
	Route::resource('lot-types', 'LotTypesController');
	Route::resource('lots', 'LotsController');
});

Route::group(['prefix' => 'manager', 'namespace' => 'Manager'], function () {
	Route::resource('customers', 'CustomersController');
	Route::resource('sales-person', 'SalesPersonController');
	Route::resource('deceased', 'DeceasedController');
	Route::resource('sales', 'SalesController');
	Route::resource('payments', 'PaymentsController');
	Route::resource('commissions', 'CommissionController');
	Route::resource('installments', 'InstallmentsController');
	Route::post('payments/filter', 'PaymentsController@filter')->name('filter');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));
Route::get('searchajax',array('as'=>'searchajax','uses'=>'AutoCompleteController@autoComplete'));

