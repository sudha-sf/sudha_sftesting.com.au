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
  public function index() {
    $pageTitle = "ADMIN - Projects";
    $projectsList = Project::with('companyObject')->get();
    return view('testmate.admin.projects-listing', ['projectsList' => $projectsList, 'page_title' => $pageTitle]);
  }


}
