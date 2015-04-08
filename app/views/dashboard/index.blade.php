@extends('layouts._admin.default')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>Dashboard </li>
    </ul>
@stop

@section('content')



    <div id="boiler" class="boiler">
        {{--Widgets are populated here via backbone.js --}}
    </div>
    <div class="deck-row turbine">
        <div class="large-14">

        </div>
    </div>
@include('dashboard._widgets.counter')
@stop

@section('backbone')
    <script>
        new App.Router;
        Backbone.history.start();

        App.widgets = new App.Collections.Widgets;
        App.widgets.fetch().then(function() {
            new App.Views.App({ collection: App.widgets });
        });
    </script>
@stop
