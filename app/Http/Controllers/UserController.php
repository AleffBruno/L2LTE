<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
	/* protected $user;
	public function __costruct(User $user)
	{
		$this->user = $user;
	} */

    public function login(Request $request)
    {
        $user = User::where('email', $request['email'])
		->where('password', User::hashPassword($request['password']))
		->first();
		if($user==null)
		{
			return \Redirect::back()->withInput()->withErrors(
				array(
					'notMatch'=>[User::$feedBackMessages['notMatch']]
					 )
			);
		}
		// perhaps needs study "guard"
		Auth::login($user);
		return redirect()->route('user.list');
    }
	
	public function list()
	{
		// ATENTE-SE A PEGADINHA DA RESPOSTA , VEJA SE É UMA COLLECTION(ARRAY)
		$user = Auth::user();
		
		if($user->isAdmin())
		{
			$users = User::all();
		}else{
			$users = User::where('id',Auth::user()->id)->get();
		}
		
		return view('user.userList',compact('users'));
	}

	public function delete($id)
	{
		User::destroy($id);
		//$user = User::find($id);
		//$user->delete();
		return redirect()->back();
	}

	public function update($id)
	{
		$user = User::find($id);
		return view('user.userUpdate',compact('user'));
	}

	public function updateStore($id,Request $request)
	{
		$user = User::find($id);
		$this->validate($request,User::$rules);
		//verificar se as rules estao rodando...
	}
}
