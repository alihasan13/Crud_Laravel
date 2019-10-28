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

//Route::get('/profile', function () {
//return view('pages.profile');
//});
//Route::get('/viewUser', function () {
//return view('pages.viewUser');
//});

//User Management

Route::get('createUser', 'UserController@create');


Route::resource('user', 'UserController');
Route::post('filter','UserController@filter');



