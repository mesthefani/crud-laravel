@extends('layouts.app')

@section('content')
<div class="container">

<a href="{{ url('/user/create') }}"> Registrar nuevo usuario </a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Avatar</th>
            <th>Username</th>
            <th>Email</th>
            <th>Acciones</th>
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
                <!--<input type="submit" value="Editar"  href="{{url ('/user/'.$user->id.'/edit') }}">  -->

                <a href="{{url ('/user/'.$user->id.'/edit') }}"> Editar </a>
                |
                <form action="{{url ('/user/'.$user->id) }}" class="d-inline" method="post">
                    @csrf
                    {{method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('Desea borrar?')"
                    value="Borrar">
                </form>
             </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection

