<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /* 
    * WARNING !!!
    * These attributes are only to know which columns the database have
    */
    private $_id;
    private $_email;
    private $_password;
    private $_name;
    private $_credits;
    private $_lang_fk;

    //START laravel mutators(getters and setters)
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = $value;
    }

    public function getEmailAttribute($value)
    {
        return $value;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = $value;
    }

    public function getPasswordAttribute($value)
    {
        return $value;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    public function getNameAttribute($value)
    {
        return $value;
    }

    public function setCreditsAttribute($value)
    {
        $this->attributes['credits'] = $value;
    }

    public function getCreditsAttribute($value)
    {
        return $value;
    }

    public function setLangFkAttribute($value)
    {
        $this->attributes['lang_fk'] = $value;
    }

    public function getLangFkAttribute($value)
    {
        return $value."MUTATORS";
    }
    //END laravel mutators(getters and setters)

    public $timestamps = false;

    public $feedBackMessages = [
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
    //this rules are only used in update, on create they are in "Auth\RegisterController"
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
    
    /* public function getAllInfo()
    {
        return $this->attributes['email'].' '.$this->attributes['password'];
    } */
}
