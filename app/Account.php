<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Account extends Model
{
    protected $fillable = [
        'login','password','lastactive','lastIP','lastServer'
    ];

    protected $primaryKey = 'login'; 

    public $incrementing = false;

    public $timestamps = false;

    public static function rules($login,$action) : Array
    {
        if($action == 'create')
        {
            $rules = array(
                'login' => "required|unique:accounts"
            );
        }
        if($action == 'update')
        {
            $rules = array(
                'login' => "required|unique:accounts,login,$login"
            );
        }

        return $rules;
    }

    public function getUser()
    {
        return $this->belongsTo(User::class,'id');
    }
}
