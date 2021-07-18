@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Роли</h1>
            <div class="col-md-8">
                <div>
                    <a href="{{ route('role.create') }}" class="btn btn-primary">Добавить роль</a>
                </div>
                <div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Отображаемое имя</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->view_name }}</td>
                                <td><div class="dropdown">
                                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="role" data-bs-toggle="dropdown" aria-expanded="false">
                                            Действия
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="role">
                                          <li><a class="dropdown-item" href="{{ route('role.edit', $role->id) }}">Изменить</a></li>
                                            <li><a>
                                                    {!! Form::open(['method' => 'DELETE','route' => ['role.destroy', $role->id]]) !!}
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
                    {{ $roles->render() }}
                </div>



            </div>
        </div>
    </div>
@endsection
