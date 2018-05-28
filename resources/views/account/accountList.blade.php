@extends('adminlte::page')

@section('title', 'Lineage2')

@section('content_header')
    <h1>Accounts List</h1>
@stop

@section('content')
    @foreach($accounts as $account)
        <p>{{$account->login}}</p>
    @endforeach
@stop