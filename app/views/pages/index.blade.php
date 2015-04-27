@extends('layouts.default')

@section('projection')
    <div class="projector">
        @include('layouts._partials.nav',  array('negative' => true))
        <div class="row">
            <div class="push_one ten columns hookline negative">
                <h1>Analytical report widgets at the touch of a button.</h1>
                <div class="large metro default rounded btn">
                    <a href="#">Get Started</a>
                </div>
            </div>
        </div>
    </div>

@stop

@section('content')
    <div class="wrapper shaded" id="subfoot">
        <div class="row">
            <div class="eight columns">
                <h3>Your onestop shop for <strong>elegantly</strong> designed dashboards</h3>
            </div>
            <div class="four columns docs">
                <div class="large metro primary rounded btn">
                    <a href="#">Get Started</a>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper flush">
        <div class="row">
            <div class="four columns featured">
                <h4>Business Entities</h4>
                <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
            </div>
            <div class="four columns featured">
                <h4>Google Analytics</h4>
                <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
            </div>
            <div class="four columns featured">
                <h4>Dashboard Overview</h4>
                <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
            </div>
        </div>
        <div class="row">
            <div class="four columns featured">
                <h4>Dashboard Builder</h4>
                <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
            </div>
            <div class="four columns featured">
                <h4>Customer CRM</h4>
                <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
            </div>
            <div class="four columns featured">
                <h4>Representatives</h4>
                <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
            </div>
        </div>
        <div class="row flush-image">
            {{HTML::image('img/browser.png')}}
        </div>
    </div>
    <div class="wrapper shaded">
        <div class="row p-b-50">
            <div class="ten columns">
                <h3><strong>Stylistically Awesome</strong></h3>
                <h3>Representing your data clearer than you've <strong>ever seen</strong></h3>
            </div>
        </div>
        <div class="row">
            <div class="four columns">
                <h4>Real Time Notifictaions</h4>
                <p>Stay up to date with your business.  Flight Deck responds in real time.</p>
            </div>
            <div class="four columns">
                <h4>One Click Away</h4>
                <p>Organize all of your favorite websites into a single dashboard, arggregating new blog posts and updates from each webiste</p>
            </div>
            <div class="four columns">
                <h4>Another ancellary feature</h4>
                <p>This thing is so great, I'm running out of things to say about. Buy it already!</p>
            </div>
        </div>
    </div>
    <div class="wrapper dark-bg">
        <div class="row">
            <div class="eight columns negative">
                <h3>Sign up for our <strong>newsletter</strong> to learn more about flightdeck</h3>
            </div>
            <div class="four columns newsletter">
                <ul>
                    <li class="append field">
                        <input class="wide email input" type="email" placeholder="you@email.com">
                        <div class="medium primary btn"><a href="#">Sign Up</a></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <footer class="wrapper">
        <div class="row" id="credits">
            <div class="seven columns">
                <p>
                    <span class="nobr">Hand-crafted with pride</span>
                    <span class="nobr">by your friends</span>
                    <span class="nobr">at <a href="http://www.thinkgeneric.com/" target="_blank" title="ThinkGeneric">ThinkGeneric</a></span>
                </p>
            </div>
            <div class="five columns">
                <ul class="socbtns">
                    <li><div class="btn primary"><a target="_blank" href="https://github.com/eliseoeric/flight_deck">Github</a></div></li>
                    <li><div class="btn twitter"><a target="_blank" href="https://twitter.com/">Twitter</a></div></li>
                    <li><div class="btn facebook"><a target="_blank" href="https://www.facebook.com/">Facebook</a></div></li>
                    <li><div class="btn danger"><a target="_blank" href="https://plus.google.com/">Google+</a></div></li>
                </ul>
            </div>
        </div>
    </footer>
@stop

