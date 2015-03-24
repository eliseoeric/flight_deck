<nav id="navbar-main-nav" class="navbar">
    <div class="row">
        <a class="toggle" gumby-trigger="#navbar-main-nav #main-nav" href="#"><i class="icon-menu"></i></a>
        <h1 class="four columns logo">
            <a href="/">
                <img src="/img/flightDeck.png" gumby-retina="">
            </a>
        </h1>
        <nav class="ten columns pull_right">
            <ul id="main-nav">
                <li><a href="/features/"><span>Features </span><i class="icon-archive" title="Features"></i></a>
                    <div class="dropdown">
                        <ul>
                            <li><a href="/features/">The Grid</a></li>
                            <li><a href="/features/ui-kit/">UI Kit</a></li>
                            <li><a href="/features/toggles-switches/">Toggles &amp; Switches</a></li>
                            <li><a href="/features/fancy-tiles/">Fancy Tiles</a></li>
                            <li><a href="/features/shuffle/">Shuffle</a></li>
                            <li><a href="/features/responsive-images/">Responsive Images</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="/docs/"><span>Documentation </span><i class="icon-doc-text" title="Documentation"></i></a>
                    <div class="dropdown">
                        <ul>
                            <li><a href="/docs/">Getting Started</a></li>
                            <li><a href="/docs/claymate/">Claymate</a></li>
                            <li><a href="/docs/grid/">The Grid</a></li>
                            <li><a href="/docs/ui-kit/">UI Kit</a></li>
                            <li><a href="/docs/components/">Components</a></li>
                            <li><a href="/docs/extensions/">Extensions</a></li>
                            <li><a href="/docs/mixins/">Mixins</a></li>
                            <li><a href="/docs/javascript/">JavaScript</a></li>
                            <li><a href="/docs/designers/">Designers</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="http://gumbyframework.com/customize"><span>Customize </span><i class="icon-cog" title="Customize"></i></a></li>
                <li><a href="https://plus.google.com/communities/108760896951473344451" target="_blank"><span>Community </span><i class="icon-chat" title="community"></i></a></li>
                @if($currentUser)
                    <li>
                        <a href="#">Hello, {{$currentUser->username}}</a>
                        <div class="dropdown">
                                <li><a href="#">My Profile</a></li>
                                <li class="active"> {{ link_to_route('logout_path', 'Log Out') }}</li>
                        </div>
                    </li>

                @else
                    <li><a href="" class="button radius switch" gumby-trigger="#signIn">Sign In</a></li>
                    <li>
                        <p class="medium pretty default btn icon-user-add icon-left">
                            {{link_to_route('register_path', 'Register')}}
                        </p>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</nav>

<div class="modal" id="signIn">
    <div class="content">
        <a class="close switch" gumby-trigger="|#signIn"><i class="icon-cancel" /></i></a>
        <div class="row">
            <h2>Welcome to Flight Deck.</h2>
            @include('layouts._partials.login_form')
        </div>
    </div>
</div>