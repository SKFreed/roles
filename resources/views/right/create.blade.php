@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="form-group required">
            {{ Form::open(array('route' => array('right.store'), 'method' => 'post')) }}
            <div class="park-form">
                <h4>Добавление прав</h4>


                <div class="park-input">
                    {{ Form::label('name', 'Имя') }}
                    {{ Form::text('name','',array('class' => 'form-control')) }}
                </div>
                <div class="park-input">
                    {{ Form::label('view_name', 'Отображаемое имя') }}
                    {{ Form::text('view_name','',array('class' => 'form-control')) }}
                </div>

            </div>
            <div class="well well-sm clearfix">
                <button class="btn btn-success pull-right" type="submit">Добавить</button>
            </div>
            {{ Form::close() }}


        </div>

    </div>
@endsection
