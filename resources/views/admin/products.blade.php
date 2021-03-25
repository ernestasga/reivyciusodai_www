@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>PRODUCTS</h1>
@stop

@section('content')
    <p>Available product management</p>
    @include('inc.admin.product.add')
    @include('inc.admin.product.list')


@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#products_table').DataTable();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(".del_img_button").click(function(){
            var id = this.id;
            $.ajax({
                url: '/admin/media',
                type: 'DELETE',
                data: {_token: CSRF_TOKEN, id: id},
                success: function (data) {
                    $("#img-"+id).remove();
                }
            });
        });
    } );

</script>
@stop
