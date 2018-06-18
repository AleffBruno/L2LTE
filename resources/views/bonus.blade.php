@extends('adminlte::page')

@section('title', 'Lineage2')

@section('content_header')
    <h1>Bonus</h1>
@stop

@section('content')
    @include('alerts.all_alerts')
    <form method="POST" action="{{route('bonus.store')}}">
    {{ csrf_field() }}
        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <input name="id[]" value="{{$user->id}}" type="hidden" class="form-control" id="id" >

                    <th>{{$user->id}}</th>
                    <th><input name="name[]" value="{{$user->name}}" type="text" class="form-control" id="name" ></th>
                    <th><input name="email[]" value="{{$user->email}}" type="email" class="form-control" id="email" ></th>
                </tr>
                @endforeach
            </body>
        </table>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@stop