<div class="wrapper top-bar" gumby-fixed="top">
    <div class="logo" >
       <h3>flight<strong>deck</strong></h3>
    </div>
    <div class="sidebar-toggle">
        <a href="#" class="toggle" gumby-trigger="#workbench-sidebar"><i class="icon-menu"></i></a>
    </div>

    <div class="seach-bar">
        <ul>
            <li class="field">
                <input class="xxwide input" type="text" placeholder="search..." />
            </li>
        </ul>
    </div>

    <nav class="user-menu">
       <ul class="user-details--interact">
           <li>
               <a href="#" class="toggle" gumby-trigger="#user-notifications"><span class="default badge">2</span></a>
           </li>
           <li>
               <a href="#" class="toggle" gumby-trigger="#user-interface">Hello, {{$currentUser->username}}</a>
           </li>
           <li>
               <div class="gravatar-icon" style='background-image:url({{ Gravatar::src($currentUser->email, 32) }})';></div>
           </li>
       </ul>
        <ul id="user-notifications" class="user-details notifications">
            <li>You have 10 new notifications</li>
            <li><hr></li>
            <li><a href=""><span class="default badge">!</span> New Sales Rep</a></li>
            <li><a href=""><span class="default badge">!</span> New Purchase Order</a></li>
        </ul>

        <ul id="user-interface" class="user-details interface">
            <li><a href="#"><i class="fa fa-tachometer"></i>Settings</a></li>
            <li><a href=""><i class="fa fa-comments-o"></i>Feedback</a></li>
            <li><a href=""><i class="fa fa-cog"></i>Help</a></li>
            <li class="faux-footer"><a href="{{ URL::route('logout_path') }}">Logout<i class="fa fa-power-off"></i></a></li>
        </ul>

    </nav>

    <div>
        {{--profile user whatever--}}
    </div>
</div>