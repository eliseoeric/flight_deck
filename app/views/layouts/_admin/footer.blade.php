
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
            document.write('<script src="http://hanger.dev:8000/js/libs/jquery-2.0.2.min.js"><\/script>');
        } else {
            document.write('<script src="http://hanger.dev:8000/js/libs/jquery-1.10.1.min.js"><\/script>');
        }
    }
</script>
<!--
Include gumby.js followed by UI modules followed by gumby.init.js
Or concatenate and minify into a single file -->
{{ HTML::script('js/libs/gumby.js', array('gumby-touch' => 'js/libs')) }}
{{ HTML::script('js/libs/ui/gumby.retina.js') }}
{{ HTML::script('js/libs/ui/gumby.fixed.js') }}
{{ HTML::script('js/libs/ui/gumby.skiplink.js') }}
{{ HTML::script('js/libs/ui/gumby.toggleswitch.js') }}
{{ HTML::script('js/libs/ui/gumby.checkbox.js') }}
{{ HTML::script('js/libs/ui/gumby.radiobtn.js') }}
{{ HTML::script('js/libs/ui/gumby.tabs.js') }}
{{ HTML::script('js/libs/ui/jquery.validation.js') }}
{{ HTML::script('js/libs/gumby.init.js') }}
{{ HTML::script('js/plugins.js') }}
{{ HTML::script('js/main.js') }}

{{ HTML::script('js/vendor/underscore.js') }}
{{ HTML::script('js/vendor/backbone.js') }}
{{ HTML::script('js/app.js') }}
{{ HTML::script('js/models.js') }}
{{ HTML::script('js/collections.js') }}
{{ HTML::script('js/views.js') }}
{{ HTML::script('js/router.js') }}

{{ HTML::script('js/vendor/backgrid/backgrid.js') }}
{{ HTML::script('js/vendor/highcharts/highcharts.js') }}

{{ HTML::script('js/vendor/classie.js') }}
{{ HTML::script('js/vendor/notificationFx.js') }}

@yield('backbone')
<script>
@yield('notification')
</script>
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