@extends('adminlte::page')

@section('title', 'Lineage2')

@section('content_header')
    <h1>Users</h1>
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
            <tr>
                <th>1</th>
                <th>Aleff</th>
            </tr>
            <tr>
                <th>2</th>
                <th>Jose</th>
            </tr>
        </tbody>
    </table>
@stop