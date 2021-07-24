@extends('layouts.app')

@section('content')
    <div class="container">
        @role ('admin')
        ADMIN
        @endrole
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="head">Назначение пользователям ролей</h1>
                <div class="panel-body">
                    <table  class="table">
                        <thead>
                        <th>Имя</th>
                        <th>E-Mail</th>
                        <th>Роли</th>
                        <th>Действия</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{ $role->view_name }}&nbsp
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Действия
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('role_user.edit',$user->id) }}">Изменить</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
