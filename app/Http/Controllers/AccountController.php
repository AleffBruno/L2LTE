<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;

class AccountController extends Controller
{
    public function createAccount($id)
	{
		return view('account.accountCreate',compact('id'));
    }
    
    //$id is the idUserRefecenre to create an account children
    public function store($id,Request $request)
    {
        $user = User::find($id);
        $account = new Account();
        $this->validate($request,Account::rules($request->login,'create'));
        $account->login = $request->login;
        $account->password = User::hashPassword($request->password);
        $account->lastactive = $request->lastactive;
        $account->lastIP = $request->lastIP;
        $account->lastServer = $request->lastServer;
        $user->getAccounts()->save($account);
        return redirect()->back()->with(['success'=>'Account criada com sucesso']);
    }

    public function accountList($id)
    {
        $user = User::find($id);
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
}
