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
        $rules = array(
            'password' => "required|max:45",
            'lastactive' => 'nullable|numeric',
            'access_level' => 'nullable|integer',
            'lastIP' => 'nullable|ip',
            'lastServer' => 'nullable|max:4|integer'
        ); 

        if($action == 'create')
        {
            $rules['login'] = "required|min:3|max:45|string|unique:accounts";
        }
        if($action == 'update')
        {
            $rules['login'] = "required|unique:accounts,login,$login";
        }
        //dd($rules);
        return $rules;
    }

    public function getUser()
    {
        return $this->belongsTo(User::class,'id');
    }
}
