<div class="large-8 large-offset-2 columns">
    {{ Form::open(['route' => 'login_path']) }}
    <fieldset>
        <legend>User Login</legend>
        <div class="row">
            <div class="large-12  columns">
                <div class="row collapse">
                    <div class="small-3 columns">
                        {{ Form::label('email', 'Email Address', ['class' => 'button prefix']) }}
                    </div>
                    <div class="small-9 columns">
                        {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
                <div class="row collapse">
                    <div class="small-3 columns">
                        {{ Form::label('password', 'Password', ['class' => 'button prefix']) }}
                    </div>
                    <div class="small-9 columns">
                        {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group large-offset-2 large-8 columns">
                {{ Form::submit('Login', ['class' => 'button radius expand']) }}
            </div>
        </div>
    </fieldset>
    {{ Form::close() }}
</div>