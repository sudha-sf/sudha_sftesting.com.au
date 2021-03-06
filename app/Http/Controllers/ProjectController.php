<?php

namespace App\Http\Controllers;
use DB;
use App\Project;
use App\Asset;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
  public function index() {
    $pageTitle = "Projects";
    $companyID = Auth::user()->companyID;

    if(TESTMATE_COMPANY_ID != $companyID){
      $projectsList = Project::where('companyID', '=', $companyID)->get();
    }else{
      $projectsList = Project::all();
    }

    return view('testmate.projects-listing', ['projectsList' => $projectsList, 'page_title' => $pageTitle]);
  }
  public function showProject($projectCode, $assetID = null) {
    $companyID = Auth::user()->companyID;
    if(TESTMATE_COMPANY_ID != $companyID){
      $project = Project::where('companyID', '=', $companyID)->where('code', $projectCode)->firstOrFail();
    }else{
      $project = Project::where('code', $projectCode)->firstOrFail();
    }
    $filterKey = Input::get('filterKey','ALL');
    $assetsHtml = $this->formatAssetsList($project, $filterKey);

    $pageTitle = $project->name. " Project";
    return view('testmate.project-page', ['project' => $project, 'filesHtml' => $assetsHtml->filesHtml, 'timelineHtml' => $assetsHtml->timelineHtml, 'page_title' => $pageTitle, 'assetID' =>$assetID, 'projectCode'=>$projectCode]);
  }



  function formatAssetsList($project, $filterKey){
    //dump($filterKey);die;
    $assetFilessHtml = "";
    $timelineHtml = "";
    $conditions = array('projectID'=>$project->projectID);
    if($filterKey != 'ALL'){
        $conditions['assetType'] = $filterKey;
    }
    $assets = Asset::where($conditions)->orderBy('uploadDate', 'desc')->get();
    foreach($assets as $asset){
      if($asset->assetType == "TIMELINE"){
        $timelineHtml .= $this->formatTimeLine($asset);
      }else{
        $assetFilessHtml .= $this->formatAssetHtml($asset);
      }

    }

    $assetsHtml = (object) ['filesHtml' => $assetFilessHtml, 'timelineHtml' => $timelineHtml];
    return $assetsHtml;
  }

  function formatAssetHtml($asset){
    $html = '<li  class="item asset-'.$asset->assetType.'" >
      <a href="'.$asset->url.'" target="_blank" class=" asset-item" id="'.$asset->assetID.'"  asset-type="'.$asset->assetType.'" name="'.$asset->name.'">
      <div class="asset-image product-'.$asset->assetType.'"></div>
      <div class="product-info">
          <span class="product-title">'.$asset->name.'</span>
          <span class="label '.$this->formatAssetStatus($asset->status).' pull-right">'.$asset->status.'</span>
          <span class="product-description">'.$asset->description.'</span>
          <span class="product-description asset-date"><strong>Upload Date: </strong>'.$asset->uploadDate.'</span>
      </div>
      </a>
    </li>';
    return $html;
  }

  function formatAssetStatus($status){
    switch ($status) {
      case 'Information':
        return "label-info";
        break;
      case 'Pending Approval':
          return "label-warning";
          break;
      case 'Approved':
        return "label-success";
        break;
    }
  }


  function formatTimeLine($asset){
    $html = '  <li class="time-label"><span class="bg-green">'.$asset->uploadDate.'</span></li>
            <li>
                <!-- timeline icon -->
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header">'.$asset->name.'</h3>
                    <div class="timeline-body">'.$asset->description.'</div>
                </div>
            </li>';
    return $html;

  }

  public function calendar() {
    $pageTitle = "Calendar";
    $companyID = Auth::user()->companyID;

    if(TESTMATE_COMPANY_ID != $companyID){
      $projectsList = Project::where('status', '!=', 'COMPLETED')
                            ->where('companyID', '=', $companyID)
                            ->get();
    }else{
      $projectsList = Project::where('status', '!=', 'COMPLETED')->get();
    }

    for ($i = 0; $i < count($projectsList); $i++) {
        $projectsList[$i]->assets = Asset::where('projectID', $projectsList[$i]->projectID)
                                        ->where('assetType','TIMELINE')
                                        ->get();
    }
    return view('testmate.calendar', ['projectsList' => $projectsList, 'projectsList' => $projectsList, 'page_title' => $pageTitle]);
  }

}
