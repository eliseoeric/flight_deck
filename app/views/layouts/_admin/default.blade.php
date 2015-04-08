@include('layouts._admin.header')
<body>
<div class="workbench">
    @include('layouts._admin.topbar')
    @include('layouts._admin.sidebar')
    @include('layouts._partials.flash')
    <section class="workbench-core">
    @yield('breadcrumb')
    @yield('content')
    </section>
</div>

@include('layouts._admin.footer')