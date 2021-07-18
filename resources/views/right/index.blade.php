@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Права</h1>
            <div class="col-md-8">
                <div>
                    <a href="{{ route('right.create') }}" class="btn btn-primary">Добавить право</a>
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

                        @foreach($rights as $right)
                            <tr>
                                <td>{{ $right->name }}</td>
                                <td>{{ $right->view_name }}</td>
                                <td><div class="dropdown">
                                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" id="right" data-bs-toggle="dropdown" aria-expanded="false">
                                            Действия
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="right">
                                           <li><a class="dropdown-item" href="{{ route('right.edit', $right->id) }}">Изменить</a></li>
                                            <li><a >
                                                    {!! Form::open(['method' => 'DELETE','route' => ['right.destroy', $right->id]]) !!}
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
                    {{ $rights->render() }}
                </div>



            </div>
        </div>
    </div>
@endsection
