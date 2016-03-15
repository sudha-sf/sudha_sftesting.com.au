<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use App\Company;
use App\User;
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
    public function index()
    {
        $pageTitle = "ADMIN - Companies";
        $companies = Company::all();

        return view('testmate.admin.companies.companies-listing', ['page_title' => $pageTitle, 'companies' => $companies]);
    }

    /*
     * Show Listing user in company
     * */

    public function showUsersCompany($companyID)
    {

        $pageTitle = '';
        $users = array();

        $company = Company::find($companyID);
        $users = User::where('companyID','=',$companyID)->get();

        return view('testmate.admin.companies.show-user-company',
            [
                'page_title' => $pageTitle,
                'company' => $company,
                'users' => $users
            ]);
    }
}
