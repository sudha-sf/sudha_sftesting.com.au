<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;
use App\Project;
use App\Asset;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
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
  public function index(Request $request) {
    $pageTitle = "ADMIN - Projects";
    /*
     * Process create/update project
     */
    if($request->isMethod('post')){
      $params = $request->all();
      $project = new Project();
      $project->companyID = Auth::user()->companyID;
      $project->name = $params['name'];
      $project->code = 'WES-'.strtoupper($params['name']);
      $project->description = $params['description'];
      $project->startingDate = date('Y-m-d',strtotime($params['startingDate']));
      $project->testersAmount = $params['testersAmount'];
      $project->status = 'APPROVAL PENDING';
      $project->userID = Auth::user()->userID;
      $project->adminID = (Auth::user()->isCompanyAdmin == 1? Auth::user()->userID: null);
      $project->lastUpdateDate = date('Y-m-d');
      $project->save();
    }elseif($request->isMethod('put')){

    }elseif($request->isMethod('delete')){

    }
    $projectsList = Project::with('companyObject')->get();
    return view('testmate.admin.projects-listing', ['projectsList' => $projectsList, 'page_title' => $pageTitle]);
  }
}
