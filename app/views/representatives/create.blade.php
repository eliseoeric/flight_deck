@extends('layouts._admin.default')
@include('layouts._partials.errors')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
        <li>{{ link_to_route('admin.representatives.index', 'Sales Reps') }}</li>
        <li><a href="#" class="active">New Sales Rep</a></li>
    </ul>
@stop

@section('content')
    <div class="boiler">
        <div class="deck-row">
            <div class="large-7">
                <div class="panel">
                    <header class="panel-header">

                    </header>

                    {{ Form::open(['route' => 'admin.representatives.store', 'method' => 'post']) }}
                    <div class="row">
                        <div class="form-col-6">
                            <! -- First Name Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('first_name', 'First Name:') }}
                                {{ Form::text('first_name', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-col-6">
                            <! -- Last Name Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('last_name', 'Last Name:') }}
                                {{ Form::text('last_name', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-col-6">
                            <! -- Email Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('email', 'Email:') }}
                                {{ Form::text('email', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-col-6">
                            <! -- Phone Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('phone', 'Phone:') }}
                                {{ Form::text('phone', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-col-6">
                            <! -- Goal Form Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('sales_goal', 'Sales Goal:') }}
                                {{ Form::text('sales_goal', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="">
                            <div class="medium primary rounded  btn">
                                {{ Form::submit('Create Rep', ['class' => '']) }}
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="large-4">
                <div class="panel ">
                    <header class="panel-header">
                        <h3 class="panel-title">New Representative</h3>
                    </header>
                    <div class="panel-body">
                        <h3>Showcase and guide users with a better UI and UX</h3>
                        <p>Fill out the form to the left to create a new representative.  Once the representative has been created you will need to associate it with a Region.</p>
                        <div class="medium secondary btn"><a href="">More</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="deck-row turbine">
        <div id="table_wrap" class="large-12">
        </div>
    </div>
@stop

@section('backbone')
    <script>
        $(function () {
            $('#rep_sales').highcharts(Charts);
        });
        new App.Router;
        Backbone.history.start();

        //    App.widgets = new App.Collections.Widgets;
        //    App.widgets.fetch().then(function() {
        //        new App.Views.App({ collection: App.widgets });
        //    });

        App.reps = new App.Collections.Reps;

        var columns = [{
            name: "id", // The key of the model attribute
            label: "ID", // The name to display in the header
            editable: false, // By default every cell in a column is editable, but *ID* shouldn't be
            // Defines a cell type, and ID is displayed as an integer without the ',' separating 1000s.
            cell: Backgrid.IntegerCell.extend({
                orderSeparator: ''
            })
        }, {
            name: "first_name",
            label: "First Name",
            editable: false,
            // The cell type can be a reference of a Backgrid.Cell subclass, any Backgrid.Cell subclass instances like *id* above, or a string
            cell: "uri-id" // This is converted to "StringCell" and a corresponding class in the Backgrid package namespace is looked up
        }, {
            name: "last_name",
            label: "Last Name",
            editable: false,
            cell: "uri-id" // An integer cell is a number cell that displays humanized integers
        }, {
            name: "email",
            label: "Email Address",
            editable: false,
            cell: "email" // A cell type for floating point value, defaults to have a precision 2 decimal numbers
        }, {
            name: "net_sales",
            label: "Current Sales",
            editable: false,
            cell: "Number"
        }];

        // Initialize a new Grid instance
        var grid = new Backgrid.Grid({
            columns: columns,
            collection: App.reps
        });

        // Render the grid and attach the root to your HTML document
        $("#table_wrap").append(grid.render().el);

        App.reps.fetch({reset: true});
    </script>
@stop