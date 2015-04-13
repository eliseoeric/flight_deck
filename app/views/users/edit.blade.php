{{--ToDo : Add field for activation email/automatic activation
            Regions, Customers, etcs--}}
@extends('layouts._admin.default')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
        <li>{{ link_to_route('admin.users.index', 'Users') }}</li>
        <li><a href="#" class="active">{{ $user->username }}</a></li>
    </ul>
@stop

@section('content')
    <div class="boiler">
        <div class="deck-row">
            <div class="large-7">
                <div class="panel">
                    <header class="panel-header">
                        <h3 class="panel-title">{{ $user->first_name . " " . $user->last_name }}</h3>
                        <div class="row">
                            {{ Form::model( $user, [ 'route' => [ 'admin.users.destroy', $user->id ], 'method' => 'delete' ] ) }}
                            <div id="delete" class="medium danger btn">
                                {{ Form::submit( 'Delete User', [ 'class' => '' ] ) }}
                            </div>
                            <div id="delete" class="medium info btn">
                                {{ Form::submit('Ban User', ['class' => '']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </header>
                    {{ Form::model($user, ['route' => ['admin.users.update', $user->id ], 'method' => 'put'] ) }}
                    <div class="row">
                        <div class="form-col-6">
                            <! -- username Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('username', 'Username:') }}
                                {{ Form::text('username', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-col-6">
                            <! -- Email Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('email', 'Email:') }}
                                {{ Form::text('email', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
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
                            <! -- Password Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('password', 'Password:') }}
                                {{ Form::password('password', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-col-6">
                            <! -- Password_confirmation Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('password_confirmation', 'Password Confirmation:') }}
                                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="">
                            <div class="medium primary rounded  btn">
                                {{ Form::submit('Update User', ['class' => '']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel large-4">
                <div class="panel">
                    <header class="panel-header">

                    </header>
                    <div class="panel-body">
                        <div clas="gravatar-wrap">
                            <div class="gravatar-frame" style='background-image:url({{ Gravatar::src($user->email, 200) }})';>
                                <div class="badge">{{$user->first_name . " " . $user->last_name}}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop