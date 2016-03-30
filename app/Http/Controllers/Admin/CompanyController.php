<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Validator;
use App\Company;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller {

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

        return view('testmate.admin.companies.companies-listing', ['page_title' => $pageTitle, 'companies' => $companies]);
    }

    /*
     * Show Listing user in company
     * */

    public function showUsersCompany($companyID) {

        $pageTitle = '';
        $users = array();

        $company = Company::find($companyID);
        $users = User::where('companyID', '=', $companyID)->get();

        return view('testmate.admin.companies.show-user-company', [
            'page_title' => $pageTitle,
            'company' => $company,
            'users' => $users
        ]);
    }

    /*
     * Create a new Company
     *
     * @POST("/admin/company/create")
     * @Param: ({'companyName'})
     * @Version("v1")
     */

    public function createCompany(Request $request) {
        $pageTitle = "Create New Company";

        //Process submit & saving data
        if ($request->getMethod() == 'POST') {

            $datas = $request->all();

            /* Validation form */
            $validator = Validator::make($request->all(), [
                        'companyName' => 'required'
            ]);
            /* Check exist companyname */
            $companyExist = $this->checkCompanyExist($request->get('companyName'));

            if ($companyExist == false) {
                $validator->errors()->add('companyName', 'This company name already exists!');
                return redirect('admin/companies/create')
                                ->withErrors($validator)
                                ->withInput();
            }

            if ($validator->fails()) {
                return redirect('admin/companies/create')
                                ->withErrors($validator)
                                ->withInput();
            }


            $file = array_get($datas, 'logo');
            if ($file) {
                // SET UPLOAD PATH
                $destinationPath = "testmate/images/";
                // GET THE FILE EXTENSION
                $extension = $file->getClientOriginalExtension();
                // RENAME THE UPLOAD WITH RANDOM NUMBER
                $fileName = rand(11111, 99999) . '.' . $extension;
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
                $upload_success = $file->move($destinationPath, $fileName);


                if ($upload_success) {
                    $datas['logo'] = $fileName;
                }
            } else {
                $datas['logo'] = '';
            }

            /* Save new company */
            $company = new Company();
            $company->name = $datas['companyName'];
            $company->logo = $datas['logo'];

            if ($company->save()) {
                $pageTitle = "ADMIN - COMPANIES";
                $companiesList = Company::all();
                return view('testmate.admin.companies.companies-listing', ['companies' => $companiesList, 'page_title' => $pageTitle]);
                redirect()->route('admin/companies');
            } else {
                
            }
        }
        return view('testmate.admin.companies.form-company', ['page_title' => $pageTitle]);
    }
    
    /*
     * Update company's information
     *@POST("/admin/companies/edit")
     *@Param: ({'companyID','companyName','logo})
     *@Version("v1")
     */
    public function editCompany($companyID, Request $request){
        $pageTitle = "Edit Company";
        
        /*Get Current Company Edit*/
        $company = Company::find($companyID);

        if($request->getMethod() == 'POST'){

            $datas = $request->all();

            /*Validation form*/
            $validator = Validator::make($request->all(), [
                'companyName' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('admin/companies/create')
                    ->withErrors($validator)
                    ->withInput();
            }


            $file = array_get($datas,'logo');
            if($file){
                // SET UPLOAD PATH
                $destinationPath = "testmate/images/";
                // GET THE FILE EXTENSION
                $extension = $file->getClientOriginalExtension();
                // RENAME THE UPLOAD WITH RANDOM NUMBER
                $fileName = rand(11111, 99999) . '.' . $extension;
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
                $upload_success = $file->move($destinationPath, $fileName);


                if($upload_success){
                    $datas['logo'] = $fileName;
                }
            }else{
                $datas['logo'] = $company->logo;
            }


            /*Update company*/
            $company->name = $datas['companyName'];
            $company->logo = $datas['logo'];

            if($company->save()){
                $pageTitle = "ADMIN - Company";
                $companiesList = Company::all();
                return view('testmate.admin.companies.companies-listing', ['companies' => $companiesList, 'page_title' => $pageTitle]);redirect()->route('admin/companies');
            }else{

            }


        }

        return view('testmate.admin.companies.edit',
            [
                'page_title' => $pageTitle,
                'company'=>$company
            ]);
    }
    
    /*
     * Check Company Name if exit in system
     * @Param: ({'companyName'})
     * @Version("v1")
     * */

    private function checkCompanyExist($companyName) {
        $companyExist = Company::where(array('name' => trim($companyName)))->count();
        if ($companyExist > 0) {
            return false;
        } else {
            return true;
        }
    }

}
