@include('layouts._admin.header')
<body>
@include('layouts._partials.flash')

<section class="login_wrapper">
    <div class="login_wrapper--image">
        {{HTML::image('img/login_splash.jpg')}}

        <div class="login_wrapper--image__branded">
            <h1 class="text-white">Downing</h1>
            <h3 class="text-white">Management Group</h3>
        </div>
        <div class="login_wrapper--image__description mg-b-20">
            <h3 class="text-white">Flight Deck empowers small business with powerful sales data.</h3>
            <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.</p>
        </div>
    </div>

    <div class="portal_login">
        <div class="portal_login--form">
            <div class="row">
                <div class="logo mg-b-20">
                    <h3>flight<strong>deck</strong></h3>
                </div>
                <p>Sign into your Flightdeck account</p>
            </div>
            {{ Form::open(['route' => 'login_path']) }}
            <div class="row">
                <div class="">
                    <! -- Email Address -->
                    <div class="form-group form-group-default">
                        {{ Form::label('email', 'Login', ['class' => '']) }}
                        {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'user@mailservice.com']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <! -- Email Address -->
                    <div class="form-group form-group-default">
                        {{ Form::label('password', 'Password', ['class' => '']) }}
                        {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => '*******']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <div class="medium primary rounded btn">
                        {{ Form::submit('Login In', ['class' => '']) }}
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <div class="login_wrapper--footer">
            <p><span class="nobr">Proudly developed</span>
                <span class="nobr">by your friends</span>
                <span class="nobr">at <a href="http://www.thinkgeneric.com/" target="_blank" title="Think Generic">Think Generic</a></span>
            </p>
            <p class="disclaimer">&copy; {{date('Y') }} Flight Deck</p>
        </div>
    </div>

</section>

@include('layouts._admin.footer')