@extends('layouts._admin.default')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
        <li>{{ link_to_route('admin.representatives.index', 'Sales Reps') }}</li>
        <li><a href="#" class="active">{{ $rep->first_name }} {{ $rep->last_name }}</a></li>
    </ul>
@stop

@section('content')
    <div class="boiler">
        <div class="deck-row">
            <div class="large-7">
                <div class="panel">
                    <header class="panel-header">
                        <h3 class="panel-title">{{ $rep->first_name }} {{ $rep->last_name }}</h3>
                    </header>
                    @include('layouts._partials.errors')
                    {{ Form::model($rep, ['route' => ['admin.representatives.update', $rep->id], 'method' => 'put']) }}

                    <div class="row">
                        <div class="form-col-6">
                            <! -- First Name Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('first_name', 'First Name:') }}
                                {{ Form::text('first_name', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-col-6">
                            <! -- Last Name Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('last_name', 'Last Name:') }}
                                {{ Form::text('last_name', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-col-6">
                            <! -- Email Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('email', 'Email:') }}
                                {{ Form::text('email', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-col-6">
                            <! -- Phone Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('phone', 'Phone:') }}
                                {{ Form::text('phone', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="">
                            <div class="medium primary rounded  btn">
                                {{ Form::submit('Update Rep', ['class' => '']) }}
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="large-4">
                <div class="panel ">
                    <header class="panel-header">
                        <h3 class="panel-title">Sales Statistics</h3>
                    </header>
                    <div class="panel-body">
                        <div class="panel widget counter">
                            <header class="panel-header">
                                <h3 class="panel-title">Top Earner <i class="fa fa-chevron-right"></i></h3>
                            </header>
                            <div class="panel-body">
                                <h3 class="value">$16,000</h3>
                                <p class="hint"><span class="default label">$2,150</span> until goal</p>
                            </div>
                        </div>
                        <div class="panel widget counter">
                            <header class="panel-header">
                                <h3 class="panel-title">Top Earner <i class="fa fa-chevron-right"></i></h3>
                            </header>
                            <div class="panel-body">
                                <h3 class="value">$16,000</h3>
                                <p class="hint"><span class="default label">$2,150</span> until goal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="deck-row turbine">
        <div id="table_wrap" class="large-12">
        </div>
    </div>
@stop

@section('backbone')

@stop