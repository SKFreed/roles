@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="head">Назначение ролям прав</h1>
                <div class="panel-body">
                    <table  class="table">
                        <thead>
                        <th>Имя</th>
                        <th>Отображаемое имя</th>
                        <th>Права</th>
                        <th>Действия</th>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->view_name }}</td>
                                <td>
                                    @foreach($role->rights as $right)
                                        {{ $right->view_name }}&nbsp
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Действия
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('right_role.edit',$role->id) }}">Изменить</a>
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
