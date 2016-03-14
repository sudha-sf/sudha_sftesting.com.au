<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Project;
use App\Asset;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $companyID = Auth::user()->companyID;

        $projectsList = Project::getProjects($companyID,"", "COMPLETED");

        if(TESTMATE_COMPANY_ID != $companyID){
            if(count($projectsList) > 0){

                $assetList  = Asset::leftJoin('projects', 'projects.projectID', '=', 'assets.projectID')
                ->select('assets.*', 'projects.code')
                ->where('companyID', '=', $companyID)
                ->orderBy('uploadDate','DESC')
                ->get();

                //Total user test for each project belong to user's company
                $totalUsertest = DB::table('projects')->where(array('companyID'=>$companyID))->sum('testersAmount');
            }
        }else{
            $assetList  = Asset::leftJoin('projects', 'projects.projectID', '=', 'assets.projectID')
            ->select('assets.*', 'projects.code')
            ->orderBy('uploadDate','DESC')
            ->get();
            //Total user test for each project
            $totalUsertest = DB::table('projects')->sum('testersAmount');
        }

       return view('testmate.home', ['projectsList' => $projectsList, 'assetList' => $assetList, 'totalUsertest'=> $totalUsertest]);
    }

    public function projectAssetList()
    {

    }

}
