
<nav id="navigation" role="navigation" class="{{($negative == true) ? 'transparent' : ''}} nav">
    <div class="row">
        <div class="two columns">
            <div id="logo" class="logo {{($negative == true) ? 'negative' : ''}}" >
                <a href="/" title="FrontPage"><h3>flight<strong>deck</strong></h3></a>
            </div>
        </div>
        <ul class="ten columns ">
            <li>{{link_to_route('home', 'Home')}}</li>
            <li><a href="">Features</a></li>
            <li><a href="">Pricing</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Register</a></li>
            @if($currentUser)
                <li>{{ link_to_route('admin.index', 'Dashboard')}}</li>
            @else
                <li>{{link_to_route('portal', 'Login')}}</li>
            @endif
        </ul>
    </div>
</nav>
