@extends('layouts._admin.default')

@section('content')
    @include('layouts._admin.herocrumb')
    <div id="boiler" class="boiler">
        {{--Widgets are populated here via backbone.js --}}
    </div>
    <div class="deck-row turbine">
        <div class="large-14">

        </div>
@include('dashboard.widgets.small-box')
@stop