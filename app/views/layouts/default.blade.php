@include('layouts._partials.header')
<body>

<div class="projector">
    @include('layouts._partials.nav')
    @yield('projection')
</div>
@yield('content')

@include('layouts._partials.footer')