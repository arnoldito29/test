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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::any('/register', function() {
    abort(404);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::resource('employees', 'EmployeesController');
    
    Route::name('companies')->prefix('companies')->group(function () {
        Route::get('/',['as'=>'.index','uses'=>'CompaniesController@index']);
        Route::get('/create',['as'=>'.create','uses'=>'CompaniesController@create']);
        Route::post('/store',['as'=>'.store','uses'=>'CompaniesController@store']);
        Route::get('/edit/{id}',['as'=>'.edit','uses'=>'CompaniesController@edit']);
        Route::put('/{id}',['as'=>'.update','uses'=>'CompaniesController@update']);
        Route::delete('/{id}',['as'=>'.destroy','uses'=>'CompaniesController@destroy']);
    });
});
