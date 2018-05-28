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
            <th>Criar Account</th>
            <th>Ver Accounts</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th>{{$user->id}}</th>
            <th>{{$user->email}}</th>
            <th>{{$user->name}}</th>
            <th>
                <form method="post" action="{{route('user.delete',$user->id)}}">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-exclamation-triangle"></i> 
                    </button>
                </form>
            </th>
            <th><a href="{{route('user.update',$user->id)}}" class="btn btn-warning"><i class="fa fa-wrench"></i></a></th>
            <th><a href="{{route('account.create',$user->id)}}" class="btn btn-primary"><i class="fa fa-address-card"></i></a></th>
            <th><a href="{{route('account.list',$user->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a></th>
        </tr>
    @endforeach
    </tbody>
</table>
@stop