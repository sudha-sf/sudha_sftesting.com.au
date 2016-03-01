<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('auth.login');
});

Route::get('company', 'CompanyController@index');


Route::get('auth/login', 'Auth\AuthController@authenticate');
Route::post('auth/login', 'Auth\AuthController@authenticate');
Route::get('auth/logout', 'Auth\AuthController@logout');
/*
Route::get('home', [
    'uses' => 'HomeController@index'
]);*/

Route::controllers([   'password' => 'Auth\PasswordController', ]);


View::composer('shared.main-template', 'App\Http\Composer\MainTemplateComposer');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {


});

Route::get('home', [    'middleware' => 'auth',    'uses' => 'HomeController@index']);


Route::get('projects', [    'middleware' => 'auth',    'uses' => 'ProjectController@index']);

Route::get('projects/{project}', ['middleware' => 'auth',    'uses' => 'ProjectController@showProject' ]);

/*
 * Get all comment for a video in associated asset
 */
Route::get('comments/{assetID}', [    'middleware' => 'auth',    'uses' => 'CommentController@index']);
/*
 * Post a comment related for a video in  associated asset
 */
Route::post('comments/{assetID}', [    'middleware' => 'auth',    'uses' => 'CommentController@post']);