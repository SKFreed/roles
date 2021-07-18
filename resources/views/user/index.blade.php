@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Пользователи</h1>
             <div class="col-md-8">

                   <div>
                       <table class="table">
                           <thead>
                           <tr>
                               <th>Имя</th>
                               <th>e-mail</th>
                               <th></th>
                           </tr>
                           </thead>
                       <tbody>
                           @foreach($users as $user)
                               <tr>
                                   <td>{{ $user->name }}</td>
                                   <td>{{ $user->email }}</td>
                                   <td><div class="dropdown">
                                           <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="user" data-bs-toggle="dropdown" aria-expanded="false">
                                               Действия
                                           </a>
                                           <ul class="dropdown-menu" aria-labelledby="user">
                                          {{--    <li><a class="dropdown-item" href="{{ route('user.edit', $user->id) }}">Изменить</a></li>--}}
                                               <li><a>
                                                       {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id]]) !!}
                                                       {!! Form::button('Удалить', ['type' => 'submit', 'class'=>'dropdown-item']) !!}
                                                       {!! Form::close() !!}
                                                   </a>
                                               </li>
                                           </ul>
                                       </div>
                                   </td>

                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                       {{ $users->render() }}
                   </div>



            </div>
        </div>
    </div>
@endsection
