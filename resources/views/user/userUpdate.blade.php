@extends('adminlte::page')

@section('title', 'Lineage2')

@section('content_header')
    <h1>User Update</h1>
@stop

@section('content')
    @if ( count( $errors ) > 0 )
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    @endif
    <form method="post" action="{{route('user.update.store',$user->id)}}">
    <div class="form-group">
        <label for="inputName">Nome</label>
        <input value="{{$user->name}}" type="email" class="form-control" id="inputName" placeholder="Seu nome...">
    </div>
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input value="{{$user->email}}" type="email" class="form-control" id="inputEmail" placeholder="Seu email...">
    </div>
    <div class="form-group">
        <label for="inputPassword">Senha</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Nova senha...">
        <small>Se a senha não for informada, a senha será a mesma</small>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@stop