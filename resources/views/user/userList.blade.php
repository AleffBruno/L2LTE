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
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <th>{{$user->name}}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop