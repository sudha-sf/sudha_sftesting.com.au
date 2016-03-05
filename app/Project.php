<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Project extends Model
{
  protected $table = 'projects';
  protected $primaryKey = 'projectID';
  public $timestamps = false;

  public static function GetProjectByAsset($assetID){
    $project = DB::table('projects')
      ->join('assets', 'projects.projectID', '=', 'assets.projectID')
      ->where('assets.assetID', '=', $assetID)->get();
    return $project;
  }
}
