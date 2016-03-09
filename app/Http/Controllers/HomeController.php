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

        if(TESTMATE_COMPANY_ID != $companyID){
            $projectsList = Project::where('companyID', '=', $companyID)->get();
            if(count($projectsList) > 0){
                $assetList = [];
                foreach($projectsList as $key=>$project){
                    $assetObj = Asset::where(array('projectID'=>$project->projectID))->orderBy('uploadDate','DESC')->get();
                    if($assetObj){
                        foreach($assetObj as $assetKey=>$asset){
                            $assetList[] = $asset;
                        }
                    }
                }
            }
        }else{
            $projectsList = Project::all();
            $assetList = Asset::all();
        }

       return view('testmate.home', ['projectsList' => $projectsList, 'assetList' => $assetList]);
    }

    public function projectAssetList()
    {

    }

}
