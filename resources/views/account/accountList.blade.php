@extends('adminlte::page')

@section('title', 'Lineage2')

@section('content_header')
    <h1>Accounts List</h1>
@stop

@section('content')
    
    <table id="myTable" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Login</th>
            @if(Auth()->user()->isAdmin())
            <th>Access Level</th>
            @endif
            <th>Deletar</th>
            <th>Atualizar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
        <tr>
            <td>{{$account->login}}</td>
            @if(Auth()->user()->isAdmin())
            <td>{{$account->access_level}}</td>
            @endif
            <td>
                <form method="post" action="{{route('account.delete',$account->login)}}">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-exclamation-triangle"></i>
                    </button>
                </form>
            </td>            
            <td><a class="btn btn-warning" href="{{route('account.update',$account->login)}}"><i class="fa fa-wrench"></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('js')
<script>
$(document).ready( function () {
    $('#myTable').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": false,
        "autoWidth": false
    });
});
</script>
@stop

dataTableReferences
https://stackoverflow.com/questions/25377637/datatables-cannot-read-property-mdata-of-undefined
https://stackoverflow.com/questions/41651197/cannot-end-a-section-without-first-starting-one-in-laravel
https://pt.stackoverflow.com/questions/205808/adicionar-funcionalidades-datatable-no-laravel-5-4-com-adminlte
https://github.com/almasaeed2010/AdminLTE/issues/817
