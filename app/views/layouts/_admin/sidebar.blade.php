{{--would be nice to create sidebar controller that uses some sort of nav walker to add the active class--}}

<section id="workbench-sidebar" class="sidebar"  gumby-fixed="top" >
    <nav class="vertical-nav sidebar-nav-wrap">
        <ul id="sidebar-nav">

            <li {{ (Request::is('*dashboard') ? 'class="active"' : '' )}}>
                {{ link_to_route('admin.dashboard', 'Dashboard') }}
                <span><i class="icon-layout"></i></span>
            </li>

            <li {{ (Request::is('*users') ? 'class="active"' : '' )}}>
                <a href="#"  class="toggle" gumby-trigger="#users_dropdown">Users</a>
                <span><i class="icon-users"></i></span>
            </li>
            <div class="drawer" id="users_dropdown">
                <li>{{ link_to_route('admin.users.index', 'All Users')}}</li>
                <li>{{ link_to_route('admin.users.create', 'New User')}}</li>
                <li>{{ link_to_route('admin.users.edit', 'Your Profile')}}</li>
            </div>
            <li>Reports</li>
            <li {{ (Request::is('*representatives') ? 'class="active"' : '' )}}>
                <a href="#"  class="toggle" gumby-trigger="#reps_dropdown">Sales Reps</a>
                <span><i class="icon-share"></i></span>
            </li>
            <div class="drawer" id="reps_dropdown">
                <li>{{ link_to_route('admin.representatives.index', 'All Reps')}}</li>
                <li>{{ link_to_route('admin.representatives.create', 'New Rep')}}</li>
            </div>

            <li {{ (Request::is('*regions') ? 'class="active has-dropdown"' : 'class="has-dropdown"' )}}>
                {{ link_to_route('admin.regions.index', 'Regions')}}
                <span><i class="icon-share"></i></span>
            </li>
            <div class="dropdown">
                <li>{{ link_to_route('admin.regions.index', 'All Regions')}}</li>
                <li>{{ link_to_route('admin.regions.create', 'New Region')}}</li>
            </div>
            <li {{ (Request::is('*purchaseOrders') ? 'class="active has-dropdown"' : 'class="has-dropdown"' )}}>
                {{ link_to_route('admin.purchaseOrders.index', 'Purchase Orders')}}
                <span><i class="icon-share"></i></span>
            </li>
            <div class="dropdown">
                <li>{{ link_to_route('admin.purchaseOrders.index', 'All Orders')}}</li>
                <li>{{ link_to_route('admin.purchaseOrders.create', 'New Order')}}</li>
            </div>
            <li>Customers</li>
            <li>Orders</li>
            <li>Dealers</li>
            <li>Facebook</li>
            <li>Twitter</li>
            <li>Whatever</li>
            <li><a href="#">Settings</a><span><i class="icon-cog"></i></span></li>


        </ul>
    </nav>
</section>