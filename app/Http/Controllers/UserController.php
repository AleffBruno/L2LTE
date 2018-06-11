<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Gate;
use App\Account;

class UserController extends Controller
{
	protected $user;
	public function __construct(User $user)
	{
		$this->user = $user;
	}

    public function login(Request $request)
    {
		$user = $this->user->where('email', $request['email'])
		->where('password', $this->user->hashPassword($request['password']))
		->first();

		if($user==null)
		{
			return \Redirect::back()->withInput()->withErrors(
				array(
					'notMatch'=>[$this->user->feedBackMessages['notMatch']]
					 )
			);
		}
		// perhaps needs study "guard"
		auth()->login($user);
		return redirect()->route('user.list');
    }
	
	public function list()
	{
		// ATENTE-SE A PEGADINHA DA RESPOSTA , VEJA SE É UMA COLLECTION(ARRAY)
		//$user = auth()->user();
		$user = User::find(8);
		dd($user->email);
		$user = new User();
		$user->name= "named";
		$user->email="NAMED";
		$user->password="named";
		$user->save();
		die();
		dd($user->email);
		
		if($user->isAdmin())
		{
			$users = $this->user->all();
		}else{
			$users = $this->user->where('id',auth()->user()->id)->get();
		}
		
		return view('user.userList',compact('users'));
	}

	public function delete($id)
	{
		$this->user->destroy($id);
		//$user = User::find($id);
		//$user->delete();
		return redirect()->back();
	}

	public function update($id)
	{
		/* if(Gate::denies('userAction',$id))
		{
			return abort(403, 'Unauthorized action.');
		}

		dd("pode"); */
		$user = $this->user->find($id);
		return view('user.userUpdate',compact('user'));
	}

	public function updateStore($id,Request $request)
	{
		$user = $this->user->find($id);
		if(is_null($request->password))
		{
			$request['password'] = $user->password;
			$request['password_confirmation'] = $user->password;
			$this->validate($request,$this->user->rules($id));
		}else{
			$this->validate($request,$this->user->rules($id));
			$request['password'] = $this->user->hashPassword($request->password);
			$request['password_confirmation'] = $request['password'];
		}

		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = $request->password;
		$user->save();
		return redirect()->back()->with('success','Usuario atualizado com sucesso');
	}
}
