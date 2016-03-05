<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
 * The model which will be worked with database.
 */

class Comment extends Model
{
    protected $table = 'comments';

    protected $primaryKey = 'commentID';

    protected $fillable = [
        'assetID', 'adminID', 'userID', 'comment', 'date'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "commentID" => "integer",
        "assetID" => "integer",
        "adminID" => "integer",
        "userID" => "integer",
        "comment" => "string",
        "date" => "date",
    ];
    /*
     * Validation rules
     * @var array
     */
    public static $rules = [
        "comment" => "required"
    ];

    public $timestamps = false;
    /*
     * Relationship with User object model
     */
    public function userObject()
    {
        return $this->belongsTo('App\User', 'senderUserID');
    }
    public function receiverUserObject()
    {
        return $this->belongsTo('App\User', 'receiverUserID');
    }
    /*
     * Relationship with Asset object model
     */
    public function assetObject()
    {
        return $this->belongsTo('App\Asset', 'assetID');
    }
}
