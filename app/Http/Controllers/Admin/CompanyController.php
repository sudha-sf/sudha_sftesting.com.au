<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;
use App\Company;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
  /**
   * Companies listing
   *
   * Whole company will be loaded and show to users
   *
   * @GET("/companies") to get the list with all company
   * @Versions({"v1"})
   */
  public function index() {
    $pageTitle = "ADMIN - Companies";
    $companies = Company::all();

    return view('testmate.admin.companies-listing', ['page_title' => $pageTitle, 'companies'=>$companies]);
  }
}
