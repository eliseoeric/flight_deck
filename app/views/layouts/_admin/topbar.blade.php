<div class="wrapper top-bar" gumby-fixed="top">
    <div class="logo" >
       <h3>flight.<strong>DECK</strong></h3>
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

    <nav class="user-details">
       <ul>
           <li>
               <a href="#">Hello, {{$currentUser->username}}</a>
           </li>
           <li>
               <a href="#"><i class="icon-network"></i></a>
           </li>
       </ul>
    </nav>

    <div>
        {{--profile user whatever--}}
    </div>
</div>