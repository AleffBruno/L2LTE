@extends('adminlte::page')

@section('title', 'Lineage2')

@section('content_header')
    <h1>Account Create</h1>
@stop

@section('content')
<form method="post" action="{{route('account.store',$id)}}">

    @include('alerts.all_alerts')
    {{ csrf_field() }}

    @if(Auth::user()->isAdmin())
    <div class="form-group">
        <label for="inputRole">Access Level</label>
        <select name="access_level" class="form-control" id="inputRole">
        @foreach(SystemRole::ROLES as $key => $value)
            <option value="{{$value}}">{{$key}}</option>
        @endforeach
        </select>
    </div>
    @endif

    <div class="form-group">
        <label for="inputLogin">Login</label> 
        <input name="login" type="text" class="form-control" id="inputLogin" aria-describedby="loginHelp" placeholder="Enter Login">
    </div>

    <div class="form-group">
        <label for="inputPassword">Senha</label>
        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Senha">
    </div>

    <div class="form-group">
        <label for="inputPasswordConfirm">Confirmar Senha</label>
        <input name="password_confirmation" type="password" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar Senha">
    </div>

    <div class="form-group">
        <label for="inputLastActive">LastActive</label> *opcional
        <input name="lastactive" type="text" class="form-control" id="inputLastActive" placeholder="LastActive">
    </div>

    <div class="form-group">
        <label for="inputLastIP">LastIP</label> *opcional
        <input name="lastip" type="text" class="form-control" id="inputLastIP" placeholder="LastIP">
    </div>

    <div class="form-group">
        <label for="inputLastServer">LastServer</label> *opcional
        <input name="lastserver" type="text" class="form-control" id="inputLastServer" placeholder="LastServer">
    </div>

    <button type="submit" class="btn btn-primary">Criar</button>

</form>
@stop