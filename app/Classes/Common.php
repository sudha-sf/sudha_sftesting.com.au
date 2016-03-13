<?php
namespace App\Classes;
use Session;
use App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Common{

  public static function GetSessionVariables(){
    $companyID = Auth::user()->companyID;
    $query = DB::table('projects')->where('status', '!=', "COMPLETED");
    if(TESTMATE_COMPANY_ID != $companyID){
        $query = $query->where('companyID', '=', $companyID);
    }
    $projectsList = $query->get();

    Session::put('projectsAmount',count($projectsList));
  }

}
