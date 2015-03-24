<div class="centered ten columns">
    {{ Form::open(['route' => 'login_path']) }}
    <fieldset>
        <legend>User Login</legend>
        <ul>
            <li class="field">
                {{ Form::label('email', 'Email Address', ['class' => 'inline login']) }}
                {{ Form::text('email', null, ['class' => 'wide text input', 'required' => 'required', 'placeholder' => 'user@mailservice.com']) }}
            </li>
            <li class="field">
                {{ Form::label('password', 'Password', ['class' => 'inline login']) }}
                {{ Form::password('password', ['class' => 'wide password input', 'required' => 'required', 'placeholder' => '*******']) }}
            </li>
            <li>
                <div class="medium primary btn"> {{ Form::submit('Login', ['class' => '']) }}</div>

            </li>
       </ul>
    </fieldset>
    {{ Form::close() }}
</div>