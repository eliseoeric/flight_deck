{{--ToDo : Add field for activation email/automatic activation
            Regions, Customers, etcs--}}
@extends('layouts._admin.default')

@section('content')

    <div class="large-11 medium-10 columns">
        <h1>Users</h1>
        <div class="deck-row">
            <div class="large-6 columns panel">
                <p>Here you can create new Users or edit current Users.</p>
            </div>
        </div>
        <div class="deck-row">
            <div class="large-10 medium-10 columns">
                @include('layouts._partials.errors')
                {{ Form::open(['route' => 'admin.users.store', 'method' => 'post']) }}
                <fieldset>
                    <legend>New User</legend>
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

                </fieldset>
                <fieldset>
                    <legend>User Details</legend>
                    <div class="row">
                        <! -- First Name Form Input -->
                        <div class="form-group  large-6 columns">
                            {{ Form::label('first_name', 'First Name:') }}
                            {{ Form::text('first_name', null, ['class' => 'form-control']) }}
                        </div>
                        <! -- Last Name Form Input -->
                        <div class="form-group large-6 columns">
                            {{ Form::label('last_name', 'Last Name:') }}
                            {{ Form::text('last_name', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                </fieldset>
                <div class="row">
                    <div class="form-group large-6 columns">
                        {{ Form::submit('Submit', ['class' => 'button radius small']) }}
                    </div>
                </div>
                    {{ Form::close() }}
            </div>
        </div>


    </div>

@stop