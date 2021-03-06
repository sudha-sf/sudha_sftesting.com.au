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

Route::any('forgot-pasword', 'UsersController@forgot');


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

/*
 * All route for user project
 */
Route::get('projects', [    'middleware' => 'auth',    'uses' => 'ProjectController@index']);
Route::get('projects/{project}', ['middleware' => 'auth',    'uses' => 'ProjectController@showProject' ]);
Route::get('projects/{project}/filter', ['middleware' => 'auth',    'uses' => 'ProjectController@showProject' ]);

/*
 * Get all comment for a video in associated asset
 */
Route::get('comments/{assetID}', [    'middleware' => 'auth',    'uses' => 'CommentController@index']);
/*
 * Post a comment related for a video in  associated asset
 */
Route::post('comments/{assetID}', [    'middleware' => 'auth',    'uses' => 'CommentController@post']);

/*
 * Show asset detail
 */
Route::get('projects/{project}/asset/{assetID}',['middleware' => 'auth',    'uses' => 'ProjectController@showProject' ]);

Route::get('calendar', [    'middleware' => 'auth',    'uses' => 'ProjectController@calendar']);

/********************************** ADMIN ROUTES ***************************/
/********************************** ADMIN ROUTES ***************************/
/********************************** ADMIN ROUTES ***************************/


Route::group(array('namespace'=>'Admin', 'middleware' => 'App\Http\Middleware\AdminMiddleware'), function()
{
    //All route for admin project
    Route::get('admin/projects', ['uses' => 'ProjectController@index' ]);
    Route::post('admin/projects/create', ['uses' => 'ProjectController@create']);
    Route::post('admin/projects/update/{projectID}', [ 'uses' => 'ProjectController@update']);
    Route::get('admin/projects/{projectID}', [ 'uses' => 'ProjectController@show']);
    Route::delete('admin/projects/{id}', ['uses' => 'ProjectController@index']);

    //All route for admin companies 
    Route::get('admin/companies', ['uses' => 'CompanyController@index' ]);
    Route::get('admin/companies/create', ['uses' => 'CompanyController@createCompany' ]);
    Route::post('admin/companies/create', ['uses' => 'CompanyController@createCompany' ]);
    Route::any('admin/companies/{companyID}/edit/', ['uses' => 'CompanyController@editCompany' ]);
    Route::get('admin/companies/{companyID}/users/', ['uses' => 'CompanyController@showUsersCompany' ]);
    

    //All route for admin users
    Route::get('admin/users', ['uses' => 'UserController@index' ]);
    Route::any('admin/users/create', ['uses' => 'UserController@createUser' ]);
    Route::any('admin/users/{userID}/edit', ['uses' => 'UserController@editUser' ]);
    Route::post('admin/users/{userID}/delete', ['uses' => 'UserController@deleteUser' ]);


    //All route for admin assets
    Route::get('admin/assets/{project}', ['as' => 'project—listing-admin',   'uses' => 'AssetController@index' ]);

    Route::get('admin/assets/{project}/create', [ 'uses' => 'AssetController@showCreateForm' ]);

    Route::get('admin/assets/{project}/{asset}/edit', [ 'uses' => 'AssetController@showEditForm' ]);
    Route::any('admin/assets/{project}/{asset}/delete', [ 'uses' => 'AssetController@showDeleteForm' ]);

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
