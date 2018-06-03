{{-- $account from 'AccountController@update' --}}

@extends('adminlte::page')

@section('title', 'Lineage2')

@section('content_header')
    <h1>Account Update</h1>
@stop

@section('content')
<form method="post" action="#">

    @include('alerts.all_alerts')
    @method('PUT')
    {{ csrf_field() }}

    @if(Auth::user()->isAdmin())
    <div class="form-group">
        <label for="inputRole">Access Level</label>
        <select name="access_level" class="form-control" id="inputRole">
        @foreach(SystemRole::ROLES as $key => $value)
            @if($account->access_level == $value)
            <option selected="selected" value="{{$value}}">{{$key}}</option>
            @else
            <option value="{{$value}}">{{$key}}</option>
            @endif
        @endforeach
        </select>
    </div>
    @endif

    <div class="form-group">
        <label for="inputLogin">Login</label> 
        <input value="{{$account->login}}" name="login" type="text" class="form-control" id="inputLogin" aria-describedby="loginHelp" placeholder="Enter Login">
    </div>

    <div class="form-group">
        <label for="inputPassword">Senha</label>
        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Senha">
        <small>Se a senha não for informada, a senha será a mesma</small>
    </div>

    <div class="form-group">
        <label for="inputPasswordConfirm">Confirmar Senha</label>
        <input name="password_confirmation" type="password" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar Senha">
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>

</form>
@stop