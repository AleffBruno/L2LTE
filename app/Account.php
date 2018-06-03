<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Account;
use App\Models\SystemRole;
use Illuminate\Validation\Rule;

class Account extends Model
{
    // protected $fillable = [
    //     'login','password','lastactive','lastIP','lastServer'
    // ];

    protected $table = "accounts";

    protected $primaryKey = 'login'; 

    public $incrementing = false;

    public $timestamps = false;

    public static function rules($login,$action) : Array
    {	
        $rules = array(
            'password' => "required|max:45|confirmed",
            'lastactive' => 'nullable|numeric',
            'access_level' => 'nullable|integer|boolean',
            'lastIP' => 'nullable|ip',
            'lastServer' => 'nullable|max:4|integer'
        ); 

        if($action == 'create')
        {
            $rules['login'] = "required|min:3|max:45|string|unique:accounts";
        }
        if($action == 'update')
        {
            $rules['login'] = [
                "required",
                Rule::unique('accounts')->ignore($login,'login')
            ];
        }

        return $rules;
    }

    public function getUser()
    {
        return $this->belongsTo(User::class,'id');
    }

    public function validationInputAccessLevel(Account $account,$accessLevel)
    {
        if(Auth()->user()->isAdmin() && !is_null($accessLevel) )
        {
            $account->access_level = $accessLevel;
        }else{
            $account->access_level = SystemRole::ROLES['USER'];
        }
    }

}
