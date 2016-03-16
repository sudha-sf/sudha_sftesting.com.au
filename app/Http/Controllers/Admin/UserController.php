<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Validator;
use App\User;
use App\Company;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Hash;

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

            $datas = $request->all();

            /*Validation form*/
            $validator = Validator::make($request->all(), [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required|email',
                'newPassword' => 'required',
                'confirmPass' => 'required|same:newPassword'
            ]);
            /*Check exist email*/
            $userExist = $this->checkEmailExist($request->get('email'));

            if($userExist == false) {
                $validator->errors()->add('email', 'This email already exists!');
                return redirect('admin/users/create')
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($validator->fails()) {
                return redirect('admin/users/create')
                    ->withErrors($validator)
                    ->withInput();
            }


            $file = array_get($datas,'avatar');
            if($file){
                // SET UPLOAD PATH
                $destinationPath = "uploads/avatar/";
                // GET THE FILE EXTENSION
                $extension = $file->getClientOriginalExtension();
                // RENAME THE UPLOAD WITH RANDOM NUMBER
                $fileName = rand(11111, 99999) . '.' . $extension;
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
                $upload_success = $file->move($destinationPath, $fileName);


                if($upload_success){
                    $datas['avatar'] = $fileName;
                }
            }else{
                $datas['avatar'] = '';
            }

            /*Save new user*/
            $user = new User();
            $user->companyID = $datas['companyID'];
            $user->firstName = $datas['firstName'];
            $user->lastName = $datas['lastName'];
            $user->email = $datas['email'];
            $user->password = Hash::make($datas['newPassword']);
            $user->updated_at = date('Y-m-d');
            $user->avatar = $datas['avatar'];

            $user->enabled = 0;
            if(array_key_exists('enabled',$datas)){
                $user->enabled = 1;
            }

            $user->isCompanyAdmin = 0;
            if(array_key_exists('isCompanyAdmin',$datas)){
                $user->isCompanyAdmin = 1;
            }


            if($user->save()){
                $pageTitle = "ADMIN - Users";
                $usersList = User::all();
                return view('testmate.admin.users.users-listing', ['usersList' => $usersList, 'page_title' => $pageTitle]);redirect()->route('admin/users');
            }else{

            }


        }
        return view('testmate.admin.users.form-user', ['page_title' => $pageTitle, 'companiesList'=>$companiesList]);
    }


    /*
     * Update user's information
     *@POST("/admin/users/edit")
     *@Param: ({'firstName','lastName', 'email', 'password', 'enabled', 'isCompanyAdmin'})
     *@Version("v1")
     */
    public function editUser($userID, Request $request){
        $pageTitle = "Edit User";
        $companiesList = Company::all();

        /*Get Current User Edit*/
        $user = User::find($userID);

        if($request->getMethod() == 'POST'){

            $datas = $request->all();

            /*Validation form*/
            $validator = Validator::make($request->all(), [
                'firstName' => 'required',
                'lastName' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('admin/users/create')
                    ->withErrors($validator)
                    ->withInput();
            }


            $file = array_get($datas,'avatar');
            if($file){
                // SET UPLOAD PATH
                $destinationPath = "uploads/avatar/";
                // GET THE FILE EXTENSION
                $extension = $file->getClientOriginalExtension();
                // RENAME THE UPLOAD WITH RANDOM NUMBER
                $fileName = rand(11111, 99999) . '.' . $extension;
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
                $upload_success = $file->move($destinationPath, $fileName);


                if($upload_success){
                    $datas['avatar'] = $fileName;
                }
            }else{
                $datas['avatar'] = $user->avatar;
            }


            /*Save new user*/
            $user->companyID = $datas['companyID'];
            $user->firstName = $datas['firstName'];
            $user->lastName = $datas['lastName'];
            $user->updated_at = date('Y-m-d');
            $user->avatar = $datas['avatar'];

            $user->enabled = 0;
            if(array_key_exists('enabled',$datas)){
                $user->enabled = 1;
            }

            $user->isCompanyAdmin = 0;
            if(array_key_exists('isCompanyAdmin',$datas)){
                $user->isCompanyAdmin = 1;
            }


            if($user->save()){
                $pageTitle = "ADMIN - Users";
                $usersList = User::all();
                return view('testmate.admin.users.users-listing', ['usersList' => $usersList, 'page_title' => $pageTitle]);redirect()->route('admin/users');
            }else{

            }


        }

        return view('testmate.admin.users.edit',
            [
                'page_title' => $pageTitle,
                'companiesList'=>$companiesList,
                'user'=>$user
            ]);
    }

    /*
     *  Delete User
     * */
    public function deleteUser(){

    }

    private function checkEmailExist($email)
    {
        $userExist = User::where(array('email'=>$email))->count();
        if($userExist > 0){
            return false;
        }else{
            return true;
        }
    }

}
