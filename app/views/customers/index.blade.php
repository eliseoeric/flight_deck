@extends('layouts._admin.default')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
        <li><a href="#" class="active">Customers</a>
        </li>
    </ul>
@stop

@section('content')
    <div class="boiler">
        <div class="deck-row">
            <div class="large-4">
                <div class="panel ">
                    <header class="panel-header">
                        <h3 class="panel-title">Getting Started</h3>
                    </header>
                    <div class="panel-body">
                        <h3>Create a New Customer</h3>
                        <p>Flight Deck let's you easily create and manage your sales reps via our simple user friendly tables. Get started now by creating a new rep and see what all the fuss is about.</p>
                        <div class="medium secondary btn">{{ link_to_route('admin.customers.create', 'New Customer') }}</div>
                    </div>
                </div>
            </div>
            <div class="large-8">
                <div class="row">
                    <div class="four columns">
                        @for($i = 0; $i <= 2; $i++)
                            <div class="panel widget counter">
                                <header class="panel-header">
                                    <h3 class="panel-title">{{$customers[$i]->name}} <i class="fa fa-chevron-right"></i></h3>
                                </header>
                                <div class="panel-body">
                                    <h3 class="value">{{round($customers[$i]->purchase_orders->sum('amount'), 2)}}</h3>
                                    <p class="hint"><span class="default label">$0000</span> until goal</p>
                                </div>
                            </div>
                        @endfor

                    </div>
                    <div class="panel widget eight columns">
                        <div id="customer_sales" class="panel-body">

                        </div>
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
            Highcharts.setOptions({
                lang: {
                    thousandsSep: ',',
                    decimalPoint: '.'
                }
            });
            $('#customer_sales').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Highest Grossing Customers'
                },
                subtitle: {
                    text: 'Sales to Date'
                },
                legend: {
                    layout: 'vertical',
                    align: 'left',
                    floating: true,
                    borderWidth: 1
                },
                xAxis: {
                    type: 'datetime',
                    categories: {{json_encode($names)}}
                },
                yAxis: {
                    title: {
                        text: 'Net Sales',
                        align: 'high'
                    },
                    min: 0
                },
                tooltip: {
                    headerFormat: '<b>{series.name} on {point.x:%e. %b}</b><br>',
                    pointFormat: '${point.y:,.2f}'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: [{
                    name: {{json_encode($chartData['name'])}},
                    data: {{json_encode($chartData['data'])}}
                }]
            });
        });

        new App.Router;
        Backbone.history.start();
        App.customers = new App.Collections.Customers;

        var columns = [{
            name: "id", // The key of the model attribute
            label: "ID", // The name to display in the header
            editable: false, // By default every cell in a column is editable, but *ID* shouldn't be
            // Defines a cell type, and ID is displayed as an integer without the ',' separating 1000s.
            cell: Backgrid.IntegerCell.extend({
                orderSeparator: ''
            })
        }, {
            name: "name",
            label: "Customer",
            editable: false,
            cell: "uri-id"
        }, {
            name: "region",
            label: "Region",
            editable: false,
            cell: "regionSingle"
        },{
            name: "representative",
            label: "Representative",
            editable: false,
            cell: "repSingle"
        }, {
            name: "purchases",
            label: "Total Sales",
            editable: false,
            cell: "number"
        }];

        // Initialize a new Grid instance
        var grid = new Backgrid.Grid({
            columns: columns,
            collection: App.customers
        });

        // Render the grid and attach the root to your HTML document
        var table_wrap = $('#table_wrap');
        table_wrap.append(grid.render().el);
        var paginator = new Backgrid.Extension.Paginator({
            collection: App.customers
        });
        // Initialize a client-side filter to filter on the client
        // mode pageable collection's cache.
        var filter = new Backgrid.Extension.ClientSideFilter({
            collection: App.customers,
            fields: ['name']
        });
        // Render the filter
        table_wrap.before(filter.render().el);
        // Add some space to the filter and move it to the right
        $(filter.el).css({float: "right", margin: "20px"});

        // Render the paginator
        table_wrap.after(paginator.render().el);

        App.customers.fetch({reset: true});
    </script>

@stop