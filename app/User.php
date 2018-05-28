<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    public $timestamps = false;

    public static $feedBackMessages = [
        'notMatch' => 'Email ou Senha estão incorretos',   
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function hashPassword($password)
    {
    	$password = base64_encode(pack("H*", sha1(utf8_encode( $password ))));
    	return $password;
    }

    //WARNING : Look, rules is a FUNCTION , not a variable!!!
    public static function rules($id)
    {
        return array(
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email,$id", // double quotes
            'password' => 'required|string|min:6|confirmed'
        );
    }

    public function getAccounts()
    {
    	return $this->hasMany(Account::class,'user_fk');
    }

    public function isAdmin(){
    	$accounts = $this->getAccounts;
    	foreach($accounts as $account)
    	{
    		//se tiver access_level = 1 , redireciona pra view com todos os dados dos usuarios
    		if($account->access_level == "1")
    		{
    			return true;
    		}else{
    			// se nao tiver, vai pra view so com seus proprios dados
    		}
    	}
    	return false;
    }    
}
