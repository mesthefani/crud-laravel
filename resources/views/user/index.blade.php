@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>User List</h1>
@stop

@section('content')
<div class="container">

    <a class="btn btn-success" href="{{ url('/user/create') }}"> Register New User </a>
    <br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Avatar</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos['users'] as $user)
            <tr>
                <td>{{ $user->id}}</td>

                <td>
                    <img width="80" heigth="80" src="{{ asset('storage').'/'.$user->avatar }}" alt="">
                <!--<td>{{ $user->avatar}}</td>-->

                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td>
                    <a class="btn btn-primary" href="{{url ('/user/'.$user->id.'/edit') }}"> Editar </a>

                    <form action="{{url ('/user/'.$user->id) }}" class="d-inline" method="post">
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
