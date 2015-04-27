@include('layouts._partials.header')
<body>

@include('layouts._partials.flash')
@yield('projection')
@yield('content')

@include('layouts._partials.footer')
