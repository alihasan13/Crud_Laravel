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
//Auth::routes();
//Route::get('/', function () {
//    return view('auth.login');
//});
//
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/',function(){
//    return view('backEnd.master');
//});

/*
routes the templte using controller 
 */
//Route::get('/test', 'templateController@index');

/*
 * tested middleware
 */
Route::get("showAge",
        ["uses"=>"showAge@index",
        "middleware"=>"checkAge"
        ]);


/*
 * receiving segment from route
 */
Route::get('/getrequest/{name}/{age}','requestController@index');

/*
 * practicing query builder 
 */
Route::get('/getquery','getqueryController@index');


/*
 * 22oct
 */

Route::get('test','templateController@create');

//User Management

Route::get('createUser', 'UserController@create');
Route::resource('user', 'UserController');
Route::post('userProfile', 'UserController@userProfile');
Route::post('edit', 'UserController@edit');
Route::post('filterUser','UserController@filter');
Route::get('student', 'UserController@student');





//Rank Management
Route::post('rank/filter','RankController@filter');
Route::get('/rank','RankController@index');
Route::GET('/rank/create','RankController@create')->name('create');
Route::POST('/rank','RankController@store')->name('store');
Route::get('/rank/{id}/edit','RankController@edit')->name('edit');
Route::patch('/rank/{id}','RankController@update')->name('updateRank');
Route::DELETE('/rank/{id}','RankController@destroy')->name('delete');



//PDF generation
Route::get('htmlpdf','PDFController@htmlPdf');
Route::get('laravelProject/generatePdf','PDFController@generatePdf');
Route::get('rank/export/', 'RankController@export');


//Student Management 
Route::post('filter','StudentController@filter');
Route::get('student','StudentController@index');
Route::GET('create','StudentController@create');
Route::post('storeStudent','StudentController@store');
Route::post('update','StudentController@update');
Route::DELETE('/student/{id}','StudentController@destroy')->name('delete');
Route::get('createStudent', 'StudentController@createStudent');
Route::post('edit', 'StudentController@edit');
Route::post('userProfile', 'StudentController@userProfile');
Route::post('search', 'StudentController@search');

