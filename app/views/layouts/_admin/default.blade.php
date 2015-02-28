<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Flight Deck</title>
    {{ HTML::style('css/app.css') }}
    {{ HTML::script('js/vendor/modernizr.js') }}

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
@include('layouts._partials.header')
@include('layouts._partials.flash')
@include('layouts._admin.sidebar')
<div class="breathing-room">
    @yield('content')
</div>

<footer>
    <div class="row">
        &copy; {{date('Y') }} Flight Deck
    </div>
</footer>
{{ HTML::script('js/vendor/jquery.js') }}
{{ HTML::script('js/foundation.min.js') }}
<script>
    $(document).foundation();
    $('#flash-modal').foundation('reveal','open');
</script>
</body>
</html>