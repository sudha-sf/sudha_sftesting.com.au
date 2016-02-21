<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectx extends Model
{
  protected $table = 'projects';
  protected $primaryKey = 'projectID';
  public $timestamps = false;
}
