@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::model($right, array('route' => array('right.update', $right->id), 'method' => 'PUT', 'files'=>true)) }}
        <div class="col-md-6">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group required">
                {!! Form::label("Новое имя") !!}
                {!! Form::text("name", null ,["class"=>"form-control","required"=>"required"]) !!}
                {!! Form::label("Новое отображаемое имя") !!}
                {!! Form::text("view_name", null ,["class"=>"form-control","required"=>"required"]) !!}
            </div>
        </div>
        <div class="well well-sm clearfix">
            <button class="btn btn-success pull-right" type="submit">Изменить</button>
            <a href="#" class='btn' onclick="history.back();"><i class="fas fa-arrow-alt-circle-left" style="color: #0471d0; font-size: 30px" title="Назад"></i></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
