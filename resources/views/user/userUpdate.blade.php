@extends('adminlte::page')

@section('title', 'Lineage2')

@section('content_header')
    <h1>User Update</h1>
@stop

@section('content')

    @include('alerts.all_alerts')
    
    <form method="post" action="{{route('user.update.store',$user->id)}}">

        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="inputName">Nome</label>
            <input name="name" value="{{$user->name}}" type="text" class="form-control" id="inputName" placeholder="Seu nome...">
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input name="email" value="{{$user->email}}" type="email" class="form-control" id="inputEmail" placeholder="Seu email...">
        </div>
        <div class="form-group">
            <label for="inputPassword">Senha</label>
            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Nova senha...">
            <small>Se a senha não for informada, a senha será a mesma</small>
        </div>
        <div class="form-group">
            <label for="inputPasswordConfirm">Confirmar Senha</label>
            <input name="password_confirmation" type="password" class="form-control" id="inputPasswordConfirm" placeholder="Confirmar nova senha...">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@stop