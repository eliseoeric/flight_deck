@extends('layouts._admin.default')

@section('breadcrumb')
<ul class="breadcrumb">
    <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
    <li><a href="#" class="active">Representatives</a>
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
                        <h3>Create a New Representative</h3>
                        <p>Flight Deck let's you easily create and manage your sales reps via our simple user friendly tables. Get started now by creating a new rep and see what all the fuss is about.</p>
                        <div class="medium secondary btn">{{ link_to_route('admin.representatives.create', 'New Representative') }}</div>
                    </div>
                </div>
            </div>
            <div class="large-8">
                <div class="row">
                    <div class="four columns">
                        @for($i = 0; $i <= 2; $i++)
                            <div class="panel widget counter">
                                <header class="panel-header">
                                    <h3 class="panel-title">{{$topEarners[$i]->first_name . ' ' . $topEarners[$i]->last_name}} <i class="fa fa-chevron-right"></i></h3>
                                </header>
                                <div class="panel-body">
                                    <h3 class="value">{{$topEarners[$i]->present()->net_sales}}</h3>
                                    <p class="hint"><span class="default label">{{$topEarners[$i]->present()->until_goal}}</span> until goal</p>
                                </div>
                            </div>
                        @endfor

                    </div>
                    <div class="panel widget eight columns">
                        <div id="rep_sales" class="panel-body">

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
                series: [
                    @foreach($reps as $rep)
                    {
                    name: '{{$rep->first_name . " " . $rep->last_name}}',
                    data: {{json_encode($chartData[$rep->id])}}
                    },
                    @endforeach
                ]
            });
        });
        new App.Router;
        Backbone.history.start();


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
            cell: "uri-id"
        }, {
            name: "last_name",
            label: "Last Name",
            editable: false,
            cell: "uri-id"
        }, {
            name: "regions",
            label: "Regions",
            editable: false,
            cell: "region"
        }, {
            name: "email",
            label: "Email Address",
            editable: false,
            cell: "email" // custom cell that wraps the content in an anchor tag that goes to the edit path
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