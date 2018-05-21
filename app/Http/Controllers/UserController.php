<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
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
		
		Auth::login($user);
		//return redirect()->route('home');
		return redirect()->route('user.list');
    }

    public function store(Request $request)
    {
        $user = new User();
		$this->validate($request, User::$rules);
		//$request['password'] = Hash::make($request['password']);
		$request['password'] = User::hashPassword($request['password']);
		$user->create($request->all());
        // este cara ainda nao esta autenticado
        return "autentique esse cara e leve-o para a tela principal";
		//return redirect()->route('eloquent.user.list');
	}
	
	public function index()
	{
		// ATENTE-SE A PEGADINHA DA RESPOSTA , VEJA SE É UMA COLLECTION(ARRAY)
		$user = Auth::user();
		
		if($user->isAdmin())
		{
			$users = User::all();
			//return view('eloquent.index',compact('users'));
		}else{
			$users = User::where('id',Auth::user()->id)->get();
		}
		
		return view('user.userList',compact('users'));
	}
}
