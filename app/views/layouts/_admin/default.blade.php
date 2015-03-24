<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!-- Use the .htaccess and remove these lines to avoid edge case issues.
			 More info: h5bp.com/b/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Flight Deck || Semantic Administration Dashboard</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="humans.txt">

    <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

    <!-- Facebook Metadata /-->
    <meta property="fb:page_id" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content=""/>
    <meta property="og:title" content=""/>

    <!-- Google+ Metadata /-->
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    {{ HTML::style('css/app.css') }}
    <script src="js/libs/modernizr-2.6.2.min.js"></script>
</head>

<body>

<div class="workbench">
    @include('layouts._admin.topbar')
    @include('layouts._admin.sidebar')
    @include('layouts._partials.flash')
    <section class="workbench-core">
    @yield('content')
    </section>
</div>

<!-- Grab Google CDN's jQuery, fall back to local if offline -->
<!-- 2.0 for modern browsers, 1.10 for .oldie -->
<script>
    var oldieCheck = Boolean(document.getElementsByTagName('html')[0].className.match(/\soldie\s/g));
    if(!oldieCheck) {
        document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"><\/script>');
    } else {
        document.write('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"><\/script>');
    }
</script>
<script>
    if(!window.jQuery) {
        if(!oldieCheck) {
            document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');
        } else {
            document.write('<script src="js/libs/jquery-1.10.1.min.js"><\/script>');
        }
    }
</script>
<!--
Include gumby.js followed by UI modules followed by gumby.init.js
Or concatenate and minify into a single file -->
<script gumby-touch="js/libs" src="js/libs/gumby.js"></script>
<script src="js/libs/ui/gumby.retina.js"></script>
<script src="js/libs/ui/gumby.fixed.js"></script>
<script src="js/libs/ui/gumby.skiplink.js"></script>
<script src="js/libs/ui/gumby.toggleswitch.js"></script>
<script src="js/libs/ui/gumby.checkbox.js"></script>
<script src="js/libs/ui/gumby.radiobtn.js"></script>
<script src="js/libs/ui/gumby.tabs.js"></script>
<script src="js/libs/ui/gumby.navbar.js"></script>
<script src="js/libs/ui/jquery.validation.js"></script>
<script src="js/libs/gumby.init.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- Change UA-XXXXX-X to be your site's ID -->
<!--<script>
window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
Modernizr.load({
  load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
});
</script>-->

<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
   chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->
</body>
</html>