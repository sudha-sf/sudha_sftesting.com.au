<?php

namespace App\Http\Controllers;
use DB;
use App\Projectx;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
  public function index() {
    $pageTitle = "Projects";
    $companyID = Auth::user()->companyID;


    $projectsList = Projectx::where('companyID', '=', '1')->get();

    return view('testmate.projects-listing', ['projectsList' => $projectsList, 'pageTitle' => $pageTitle]);
  }
}
