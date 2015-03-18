{{--would be nice to create sidebar controller that uses some sort of nav walker to add the active class--}}

<div class="large-1 medium-1 columns no-padding">
    <div class="side-bar">
        <ul class="side-nav">
            <li {{ (Request::is('*dashboard') ? 'class="active"' : '' )}}>
                {{ link_to_route('admin.dashboard', 'Dashboard') }}
            </li>
            <li {{ (Request::is('*users') ? 'class="active has-dropdown"' : 'class="has-dropdown"' )}}>
                {{ link_to_route('admin.users.index', 'Users')}}
                <ul class="dropdown">
                    <li>{{ link_to_route('admin.users.index', 'All Users')}}</li>
                    <li>{{ link_to_route('admin.users.create', 'New User')}}</li>
                    <li>{{ link_to_route('admin.users.edit', 'Your Profile')}}</li>
                </ul>
            </li>
            <li>Reports</li>
            <li class="divider"></li>
            <li>Factories</li>
            <li {{ (Request::is('*regions') ? 'class="active has-dropdown"' : 'class="has-dropdown"' )}}>
                {{ link_to_route('admin.regions.index', 'Regions')}}
                <ul class="dropdown">
                    <li>{{ link_to_route('admin.regions.index', 'All Regions')}}</li>
                    <li>{{ link_to_route('admin.regions.create', 'New Region')}}</li>
                </ul>
            </li>
            <li>Sales</li>
            <li>Customers</li>
            <li>Orders</li>
            <li>Dealers</li>
            <li class="divider"></li>
            <li>Facebook</li>
            <li>Twitter</li>
            <li>Whatever</li>
            <li><a href="#">Settings</a></li>
        </ul>
    </div>
</div>