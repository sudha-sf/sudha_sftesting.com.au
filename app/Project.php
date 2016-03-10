<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Project extends Model
{
  protected $table = 'projects';
  protected $primaryKey = 'projectID';
  public $timestamps = false;

  protected $fillable = [
      'companyID', 'name', 'description', 'startingDate', 'lastUpdateDate', 'status', 'code', 'userID', 'adminID',
      'testersAmount', 'projectBriefPercentCompleted', 'kickOffMeetingPercentCompleted', 'recruitmentPercentCompleted',
      'userTestPlanPercentCompleted', 'userTestingPercentCompleted', 'resultsAnalysisPercentCompleted',
      'preliminaryFindingsPercentCompleted', 'finalReportPercentCompleted', 'highlightsVideoPercentCompleted', 'susScore'
  ];

  public function companyObject()
  {
      return $this->belongsTo('App\Company', 'companyID');
  }

  public function assetObject()
  {
    return $this->belongsTo('App\Asset', 'projectID');
  }

  public static function getProjectByAsset($assetID){
    $project = DB::table('projects')
      ->join('assets', 'projects.projectID', '=', 'assets.projectID')
      ->where('assets.assetID', '=', $assetID)->get();

    return $project;
  }
}
