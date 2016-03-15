<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
  protected $fillable = array('projectID', 'uploadDate', 'name', 'description', 'url', 'assetType', 'status', 'file');
  protected $table = 'assets';
  protected $primaryKey = 'assetID';
  public $timestamps = false;
}
