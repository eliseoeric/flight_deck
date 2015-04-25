{{--would be nice to create sidebar controller that uses some sort of nav walker to add the active class--}}

<section id="workbench-sidebar" class="sidebar"  gumby-fixed="top" >
    <nav class="vertical-nav sidebar-nav-wrap">
        <div id="logo" class="logo negative" >
            <h3>flight<strong>deck</strong></h3>
        </div>
        <ul id="sidebar-nav">
            <li>
                <a href="#"  class="toggle" gumby-trigger="#dashboard_dropdown">Dashboard</a>
                <span><i class="icon-users"></i></span>
            </li>
            <div {{ (Request::is('*dashboard') ? 'class="active drawer"' : 'class="drawer"' )}} id="dashboard_dropdown">
                <li>{{ link_to_route('admin.index', 'View Dashboard') }}</li>
                <li>{{ link_to_route('admin.widgets.create', 'New Widget')}}</li>
                <li><a href="/admin/dashboards/{{$currentUser->id}}/edit/">Dashboard Builder</a></li>
            </div>

            <li>
                <a href="#"  class="toggle" gumby-trigger="#users_dropdown">Users</a>
                <span><i class="icon-users"></i></span>
            </li>
            <div {{ (Request::is('*users') ? 'class="active drawer"' : 'class="drawer"' )}} id="users_dropdown">
                <li>{{ link_to_route('admin.users.index', 'All Users')}}</li>
                <li>{{ link_to_route('admin.users.create', 'New User')}}</li>
                <li>{{ link_to_route('admin.users.edit', 'Your Profile')}}</li>
            </div>
            <li>
                <a href="#"  class="toggle" gumby-trigger="#reps_dropdown">Sales Reps</a>
                <span><i class="fa fa-rocket"></i></span>
            </li>
            <div {{ (Request::is('*representatives') ? 'class="active drawer"' : 'class="drawer"' )}} id="reps_dropdown">
                <li>{{ link_to_route('admin.representatives.index', 'All Reps')}}</li>
                <li>{{ link_to_route('admin.representatives.create', 'New Rep')}}</li>
            </div>

            <li>
                <a href="#"  class="toggle" gumby-trigger="#regions_dropdown">Regions</a>
                <span><i class="icon-share"></i></span>
            </li>
            <div {{ (Request::is('*regions') ? 'class="active drawer"' : 'class="drawer"' )}} id="regions_dropdown">
                <li>{{ link_to_route('admin.regions.index', 'All Regions')}}</li>
                <li>{{ link_to_route('admin.regions.create', 'New Region')}}</li>
            </div>
            <li>
                <a href="#" class="toggle" gumby-trigger="#orders_dropdown">Purchase Orders</a>
                <span><i class="icon-share"></i></span>
            </li>
            <div  {{ (Request::is('*purchaseOrders') ? 'class="active drawer"' : 'class="drawer"' )}} id="orders_dropdown">
                <li>{{ link_to_route('admin.purchaseOrders.index', 'All Orders')}}</li>
                <li>{{ link_to_route('admin.purchaseOrders.create', 'New Order')}}</li>
            </div>

            <li>
                <a href="#" class="toggle" gumby-trigger="#customers_dropdow">Customers</a>
                <span><i class="icon-share"></i></span>
            </li>
            <div  {{ (Request::is('*customers') ? 'class="active drawer"' : 'class="drawer"' )}} id="customers_dropdow">
                <li>{{ link_to_route('admin.customers.index', 'All Customers')}}</li>
                <li>{{ link_to_route('admin.customers.create', 'New Customer')}}</li>
            </div>

            <li>Dealers</li>
            <li>Facebook</li>
            <li>Twitter</li>
            <li>Whatever</li>
            <li><a href="#">Settings</a><span><i class="icon-cog"></i></span></li>


        </ul>
    </nav>
</section>