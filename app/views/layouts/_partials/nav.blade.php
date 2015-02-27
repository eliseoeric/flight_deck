<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="#">Flight Deck</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
        <ul class="left">
            <li class="active"> {{ link_to_route('home', 'Home') }} </li>
            <li><a href="#">View Menu</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <ul class="right">
            <li class="divider"></li>
            @if($currentUser)
            <li class="has-dropdown">
                <a href="#">Hello, {{$currentUser->username}}</a>
                <ul class="dropdown">
                    <li><a href="#">My Profile</a></li>
                    <li class="active"> {{ link_to_route('admin.logout', 'Log Out') }}</li>
                </ul>
            </li>
            @else
            <li class="has-form">
                <a href="" class="button radius" data-reveal-id="signIn">Sign In</a>
            </li>
            @endif
        </ul>
    </section>
    <div id="signIn" class="reveal-modal" data-reveal>
        <h2>Welcome to Flight Deck.</h2>
        {{--@include('layouts._partials.login_form')--}}
        <a class="close-reveal-modal">&#215;</a>
    </div>
</nav>