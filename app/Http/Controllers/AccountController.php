<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;
use App\Models\SystemRole;


class AccountController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function createAccount($id)
	{
		return view('account.accountCreate',compact('id'));
    }
    
    //$id is the idUserRefecenre to create an account children
    public function store($id,Request $request)
    {
        //$user = User::find($id);
        $user = $this->user->find($id);
        $account = new Account();
        $this->validate($request,Account::rules($request->login,'create'));
        $account->login = $request->login;
        $account->password = User::hashPassword($request->password);
        $account->lastactive = $request->lastactive;
        $account->lastIP = $request->lastIP;
        $account->lastServer = $request->lastServer;
        //waiting a function "acceptInputAccessLevel"
        $account->validationInputAccessLevel($account,$request->access_level);
        $user->getAccounts()->save($account);
        return redirect()->back()->with(['success'=>'Account criada com sucesso']);
    }

    public function accountList($id)
    {
        //$user = User::find($id);
        $user = $this->user->find($id);
        $accounts = $user->getAccounts;
        return view('account.accountList',compact('accounts'));
    }

    public function delete($login)
    {
        Account::destroy($login);
        return redirect()->back();
    }

    public function update($login)
    {
        $account = Account::find($login);
        return view('account.accountUpdate',compact('account'));
    }

    public function updateStore($login,Request $request)
    {
        //se passar um LOGIN que nao existe na URL, da um erro. E.G: se o usuario atualizar
        //e clicar em "voltar" no navegador
        $account = Account::find($login);
            if(is_null($request->password))
            {
                $request['password'] = $account->password;
                $request['password_confirmation'] = $account->password;
                $this->validate($request,Account::rules($login,'update'));
            }else{
                $this->validate($request,Account::rules($login,'update'));
                $request['password'] = User::hashPassword($request->password);
                $request['password_confirmation'] = $request['password'];
            }
        $account->login = $request->login;
        $account->password = $request->password;
        $account->validationInputAccessLevel($account,$request->access_level);

        $account->save();
        return redirect()
            ->route('account.update',$account->login)
            ->with('success','Account atualizada com sucesso');
    }

    
}
