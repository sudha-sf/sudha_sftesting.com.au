<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use App\User;
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
}
