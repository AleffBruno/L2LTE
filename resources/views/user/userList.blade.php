@extends('adminlte::page')

@section('title', 'Lineage2')

@section('content_header')
    <h1>Users List</h1>
@stop

@section('content')
    <table id="usersTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Nome</th>
                <th>Deletar</th>
                <th>Atualizar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <th>{{$user->email}}</th>
                <th>{{$user->name}}</th>
                <th><a href="{{route('user.delete',$user->id)}}" class="btn btn-danger"><i class="fa fa-exclamation-triangle"></i></a></th>
                <th><a href="{{route('user.update',$user->id)}}" class="btn btn-warning"><i class="fa fa-wrench"></i></a></th>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop