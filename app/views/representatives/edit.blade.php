@extends('layouts._admin.default')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
        <li>{{ link_to_route('admin.representatives.index', 'Sales Reps') }}</li>
        <li><a href="#" class="active">{{ $rep->first_name }} {{ $rep->last_name }}</a></li>
    </ul>
@stop

@section('content')
    <div class="boiler">
        <div class="deck-row">
            <div class="large-7">
                <div class="panel">
                    <header class="panel-header">
                        <h3 class="panel-title">{{ $rep->first_name }} {{ $rep->last_name }}</h3>
                        <div class="row">
                            {{ Form::model($rep, ['route' => ['admin.representatives.destroy', $rep->id], 'method' => 'delete']) }}
                                <div id="delete" class="medium danger btn">
                                    {{ Form::submit('Delete Rep', ['class' => '']) }}
                                </div>

                            {{ Form::close() }}
                        </div>
                    </header>
                    @include('layouts._partials.errors')
                    {{ Form::model($rep, ['route' => ['admin.representatives.update', $rep->id], 'method' => 'put']) }}
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
                            <! -- Counties Input -->
                            <div class="form-group form-group-default">
                                {{ Form::label('counties', 'Counties:') }}
                                {{ Form::select('counties[]', $countiesAll, $counties, ['class' => 'form-control counties-select', 'multiple' => 'multiple']) }}
                            </div>
                        </div>
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
                                {{ Form::submit('Update Rep', ['class' => '']) }}
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="large-2">
                <div class="panel ">
                    <header class="panel-header">
                        <h3 class="panel-title">Sales Statistics</h3>
                    </header>
                    <div class="panel-body">
                        <div class="panel widget counter">
                            <header class="panel-header">
                                <h3 class="panel-title">Sales To Date <i class="fa fa-chevron-right"></i></h3>
                            </header>
                            <div class="panel-body">
                                <h3 class="value">{{ $rep->present()->net_sales }}</h3>
                                <p class="hint"><span class="default label">{{ $rep->present()->until_goal }}</span> until goal</p>
                            </div>
                        </div>
                        <div class="panel widget counter">
                            <header class="panel-header">
                                <h3 class="panel-title">Largest Order <i class="fa fa-chevron-right"></i></h3>
                            </header>
                            <div class="panel-body">
                                <h3 class="value">$16,000</h3>
                                <p class="hint"><span class="default label">$2,150</span> until goal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="deck-row">
            <div class="large-12">
                <div class="panel widget" id="rep_sales"></div>
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
            $('.form-control.counties-select').select2();
            Highcharts.setOptions({
                lang: {
                    thousandsSep: ',',
                    decimalPoint: '.'
                }
            });
            $('#rep_sales').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Sales Last 7 Days'
                },
                legend: {
                    layout: 'vertical',
                    align: 'left',
                    floating: true,
                    borderWidth: 1
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: { // don't display the dummy year
                        month: '%e. %b',
                        year: '%b'
                    },
                    title: {
                        text: 'Date'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Net Sales'
                    },
                    min: 0
                },
                tooltip: {
                    headerFormat: '<b>{series.name} on {point.x:%e. %b}</b><br>',
                    pointFormat: '${point.y:,.2f}'
                },
                plotOptions: {
                    areapsline: {
                        fillOpacity: 1
                    }
                },
                series: [{
                    name: 'Sales',
                    data: {{json_encode($chartData)}}
                }]
            });
        });
        new App.Router;
        Backbone.history.start();

        App.Collections.Rep = Backbone.Collection.extend({
            model: App.Models.PurchaseOrder,
            url: "/json/representatives/{{ $rep->id }}"
        });

        App.orders = new App.Collections.Rep;

        var columns = [{
            name: "order_id", // The key of the model attribute
            label: "ID", // The name to display in the header
            editable: false, // By default every cell in a column is editable, but *ID* shouldn't be
            // Defines a cell type, and ID is displayed as an integer without the ',' separating 1000s.
            cell: Backgrid.IntegerCell.extend({
                orderSeparator: ''
            })
        }, {
            name: "amount",
            label: "Amount",
            editable: false,
            cell: "Number"
        }, {
            name: "customer",
            label: "Customer",
            editable: false,
            // The cell type can be a reference of a Backgrid.Cell subclass, any Backgrid.Cell subclass instances like *id* above, or a string
            cell: "string" // This is converted to "StringCell" and a corresponding class in the Backgrid package namespace is looked up
        }, {
            name: "dealer",
            label: "Dealer",
            editable: false,
            cell: "string" // A cell type for floating point value, defaults to have a precision 2 decimal numbers
        }, {
            name: "manufacturer",
            label: "Manufacturer",
            editable: false,
            cell: "string" // An integer cell is a number cell that displays humanized integers
        }];

        // Initialize a new Grid instance
        var grid = new Backgrid.Grid({
            columns: columns,
            collection: App.orders
        });

        // Render the grid and attach the root to your HTML document
        $("#table_wrap").append(grid.render().el);

        App.orders.fetch({reset: true});
    </script>
@stop