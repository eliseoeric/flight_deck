@extends('layouts._admin.default')
@include('layouts._partials.errors')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
        <li><a href="#" class="active">New Widget</a></li>
    </ul>
@stop
@section('content')
<div class="boiler">
    <div class="deck-row">
        <div class="large-5">
            <div class="panel">
                <header class="panel-header">
                    <h3 class="panel-title">Getting Started</h3>
                </header>
                <div class="panel-body">
                    <h3>Create a New Widget</h3>
                    <p>Flight Deck let's you easily create and manage your sales reps via our simple user friendly tables. Get started now by creating a new rep and see what all the fuss is about.</p>
                    <div class="medium secondary btn">{{ link_to_route('admin.representatives.create', 'New Representative') }}</div>
                </div>
            </div>
        </div>
        <div class="large-7">
            <div class="panel">

            </div>
        </div>
    </div>
</div>
<div class="deck-row turbine">

</div>

@stop