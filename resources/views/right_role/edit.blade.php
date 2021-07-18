@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="head">Редактирование прав ролей</h1>
                {{ $role->name }}
                {!! Form::open(['route' => array('right_role.update', $role->id),'method'=>'PUT']) !!}
                <div class="row">
                    <div class="col-12">
                        @php
                            //dd($role->rights()->pluck('right_id'));
                        @endphp
                        <div class="form-group">
                            {!! Form::label('right', 'Разрешения') !!}
                            {!! Form::select('right[]', $right, $role->rights()->pluck('right_id'), ['multiple' => true, 'class' => 'form-control selectpicker']) !!}
                        </div>
                    </div>
                    <div class="well well-sm clearfix">
                        <button class="btn btn-success pull-right" title="Save" type="submit">Изменить</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
