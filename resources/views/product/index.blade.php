@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Products</h1>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- toastr --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

@stop
@section('content')
<div>

    <a class="btn btn-success" href="{{ url('/product/create') }}"> Register New Product </a>
    <br>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td>{{ $product['title'] }}</td>
                <td>{{ $product['category'] }}</td>
                <td>{{ $product['description'] }}</td>
                <td>
                    <img width="80" heigth="80" src={{ $product['image'] }} alt="">
                </td>

                <td style="display:flex">
                    <a class="btn btn-primary" href="{{url ('/product/'.$product['id'].'/edit') }}"> Editar </a>

                    <form action="{{url('/product/'.$product['id'] )}}" class="d-inline" method="post">
                        @csrf
                        {{method_field('DELETE') }}
                        <input class="btn btn-primary" type="submit" onclick="return confirm('Desea borrar?')"
                        value="Borrar" >
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@stop

@section('js')
    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
        @endif
    </script>

@stop
