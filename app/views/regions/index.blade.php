@extends('layouts._admin.default')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
        <li><a href="#" class="active">Regions</a>
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
                        <h3>Region Details</h3>
                        <p>Region Details page breaks down the sales per region by representative.  Quickly see who is performing the best in which region.</p>
                        {{--<div class="medium secondary btn">{{ link_to_route('admin.regions.create', 'New Region') }}</div>--}}
                    </div>
                </div>
            </div>
            <div class="large-8">
                <div class="row">
                    <div class="panel widget twelve columns">
                        <div id="regions_table" class="panel-body">

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
            $('#regions_table').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Stacked bar chart'
                },
                xAxis: {
                    categories: [
                            @foreach($regions as $region)
                            '{{$region->region}}',
                            @endforeach
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total fruit consumption'
                    }
                },
                legend: {
                    reversed: true
                },
                plotOptions: {
                    series: {
                        stacking: 'normal'
                    }
                },
                series: {{json_encode(array_values($chartData))}}
            });
        });
        new App.Router;
        Backbone.history.start();


        App.regions = new App.Collections.Regions;

        var columns = [{
            name: "id", // The key of the model attribute
            label: "ID", // The name to display in the header
            editable: false, // By default every cell in a column is editable, but *ID* shouldn't be
            // Defines a cell type, and ID is displayed as an integer without the ',' separating 1000s.
            cell: Backgrid.IntegerCell.extend({
                orderSeparator: ''
            })
        }, {
            name: "region",
            label: "Region",
            editable: false,
            cell: "uri-id"
        }, {
            name: "representatives",
            label: "Representatives",
            editable: false,
            cell: "rep"
        }, {
            name: "net_sales",
            label: "Net Sales",
            editable: false,
            cell: "number"
        }];

        // Initialize a new Grid instance
        var grid = new Backgrid.Grid({
            columns: columns,
            collection: App.regions
        });

        // Render the grid and attach the root to your HTML document
        $("#table_wrap").append(grid.render().el);

        App.regions.fetch({reset: true});
    </script>
@stop