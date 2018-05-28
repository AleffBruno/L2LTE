@extends('adminlte::page')

@section('title', 'Lineage2')

@section('content_header')
    <h1>Accounts List</h1>
@stop

@section('content')
    @foreach($accounts as $account)
    @endforeach
    <table id="myTable" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th> 
            <th>Age</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Jill</td>
            <td>Smith</td> 
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td> 
            <td>94</td>
        </tr>
        </tbody>
    </table>
@stop

@section('js')
<script>
$(document).ready( function () {
    $('#myTable').DataTable(
        {
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    }
    );
} );
</script>
@stop

dataTableReferences
https://stackoverflow.com/questions/25377637/datatables-cannot-read-property-mdata-of-undefined
https://stackoverflow.com/questions/41651197/cannot-end-a-section-without-first-starting-one-in-laravel
https://pt.stackoverflow.com/questions/205808/adicionar-funcionalidades-datatable-no-laravel-5-4-com-adminlte
https://github.com/almasaeed2010/AdminLTE/issues/817
