<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Company;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{
  /**
   * Process get project list || Create, Update and Delete project information
   *
   * We will using API concept then we can use a function for all method(GET|POST|PUT|DELETE)
   *
   * @POST("/projects/") to create project info
   * @PUT("/projects/{id}") to update project info
   * @GET("/projects") to get the list with all project
   * @DELETE("/projects/id") to delete a project
   * @Param ({id : this is ID of project})
   * @Versions({"v1"})
   */
  public function index() {
    $pageTitle = "ADMIN - Users";

    $usersList = User::all();

    return view('testmate.admin.users.users-listing', ['usersList' => $usersList, 'page_title' => $pageTitle]);
  }

    /*
     *Create a new User
     *
     *@POST("/admin/users/create")
     *@Param: ({'firstName','lastName', 'email', 'password', 'enabled', 'isCompanyAdmin'})
     *@Version("v1")
     */

    public function createUser(Request $request){
        $pageTitle = "Create New User";
        //List all companies from database
        $companiesList = Company::all();
        //Process submit & saving data
        if($request->getMethod() == 'POST'){
          dump($request->all());die;
        }
        return view('testmate.admin.users.form-user', ['page_title' => $pageTitle, 'companiesList'=>$companiesList]);
    }


    /*
     * Update user's information
     *@POST("/admin/users/edit")
     *@Param: ({'firstName','lastName', 'email', 'password', 'enabled', 'isCompanyAdmin'})
     *@Version("v1")
     */
    public function editUser(){

    }

    /*
     *  Delete User
     * */
    public function deleteUser(){

    }

}
