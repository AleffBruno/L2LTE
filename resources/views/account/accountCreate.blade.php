@extends('adminlte::page')

@section('title', 'Lineage2')

@section('content_header')
    <h1>Account Create</h1>
@stop

@section('content')

<form method="post" action="{{route('account.store',$id)}}">
    @include('alerts.all_alerts')
    {{ csrf_field() }}
    <div class="form-group">
        <label for="inputLogin">Login</label> 
        <input name="login" type="text" class="form-control" id="inputLogin" aria-describedby="loginHelp" placeholder="Enter Login">
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="inputLastActive">LastActive</label> *opcional
        <input name="lastactive" type="text" class="form-control" id="inputLastActive" placeholder="LastActive">
    </div>
    <!-- CAN ADMIN
    <div class="form-group">
        <label for="access_level">LastActive</label>
        <input type="text" class="form-control" id="inputLastActive" placeholder="LastActive">
    </div>
        ENDCAN ADMIN-->
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