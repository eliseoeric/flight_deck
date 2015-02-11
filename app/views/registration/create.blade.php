@extends('layouts.default')

@section('content')
    <h1>You're reign as Sky Marshal starts here</h1>

    @include('layouts._partials.errors')
    {{ Form::open(['route' => 'register_path']) }}
    <fieldset>
        <legend>Registration</legend>
        <div class="row">
            <! -- Username Form Input -->
            <div class="form-group large-6 columns">
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username', null, ['class' => 'form-control']) }}
            </div>
            <! -- Email Form Input -->
            <div class="form-group large-6 columns">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="row">
            <! -- Password Form Input -->
            <div class="form-group large-6 columns">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}
            </div>
            <! -- Password_confirmation Form Input -->
            <div class="form-group large-6 columns">
                {{ Form::label('password_confirmation', 'Password Confirmation:') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group large-6 columns">
                {{ Form::submit('Submit', ['class' => 'button radius small']) }}
            </div>
        </div>
    {{ Form::close() }}
@stop