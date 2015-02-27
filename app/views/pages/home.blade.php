@extends('layouts.default')

@section('content')
    <div class="panel callout radius">
        <h2>Welcome to Flight Deck</h2>
        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
        <p>Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.</p>
        @if($currentUser)
            <p>You are logged in a the moment as {{$currentUser->username}}</p>
        @else
            <p>{{ link_to_route('register_path', 'Get Started >>', null, ['class' => 'button radius']) }}</p>
        @endif
    </div>
    <div class="panel callout radius">

    </div>
@stop