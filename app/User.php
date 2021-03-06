<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $primaryKey = 'userID';
    protected $fillable = [
        'firstName','lastName', 'email', 'password', 'enabled', 'isCompanyAdmin'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $rules = [

    ];
    /*
     * get Company of user
     * */
    public function company(){
        return $this->hasOne('App\Company', 'companyID','companyID');
    }
}
