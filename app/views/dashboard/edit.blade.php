@extends('layouts._admin.default')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>Dashboard </li>
    </ul>
@stop

@section('right-sidebar')
    @include('dashboard.builder')
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
        App.trueWidgets = new App.Collections.TrueWidgets;

        App.widgets.fetch().then(function() {
            new App.Views.WidgetBuilder({ collection: {widgets: App.widgets, trueWidgets: App.trueWidgets}});
        });
    </script>
@stop
