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


/********************************** ADMIN ROUTES ***************************/
/********************************** ADMIN ROUTES ***************************/
/********************************** ADMIN ROUTES ***************************/


Route::group(array('namespace'=>'Admin', 'middleware' => 'App\Http\Middleware\AdminMiddleware'), function()
{
    Route::get('admin/projects', ['uses' => 'ProjectController@index' ]);

    Route::get('admin/assets/{project}', ['as' => 'project—listing-admin',   'uses' => 'AssetController@index' ]);

    Route::get('admin/assets/{project}/create', [ 'uses' => 'AssetController@showCreateForm' ]);

    Route::get('admin/assets/{project}/{asset}/edit', [ 'uses' => 'AssetController@showEditForm' ]);

    Route::post('admin/assets/{project}/save', [ 'uses' => 'AssetController@save' ]);
});


/********************************** ADMIN ROUTES END ***************************/
/********************************** ADMIN ROUTES END ***************************/
/********************************** ADMIN ROUTES END ***************************/


Route::group(['prefix' => ''], function() {
    define('TESTMATE_COMPANY_ID','1');
    define('TESTMATE_EMAIL_FROM','no-reply@app.com');
    define('TESTMATE_EMAIL_FROM_NAME','Administrator');

});
