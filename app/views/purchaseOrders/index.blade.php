@extends('layouts._admin.default')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
        <li><a href="#" class="active">Purchase Orders</a></li>
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
                       <h3>Place New Purchse Order</h3>
                       <p>Here you can manage, view and track current purchase orders.  Orders can be placed within the dashboard or via our portal link.</p>
                       <div class="medium secondary btn">{{ link_to_route('admin.purchaseOrders.create', 'New Purcahse Order') }}</div>
                   </div>
               </div>
           </div>
           <div class="large-8">
               <div class="row">
                   <div class="panel widget twelve columns">
                       <div id="total_sales"></div>
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
            $('#total_sales').highcharts({
                chart: {
                    type: 'areaspline'
                },
                title: {
                    text: 'Sales this Month'
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
                    crosshairs: true,
                    shared: true,
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


        App.orders = new App.Collections.Orders;

        var columns = [{
            name: "id", // The key of the model attribute
            label: "ID", // The name to display in the header
            editable: false, // By default every cell in a column is editable, but *ID* shouldn't be
            // Defines a cell type, and ID is displayed as an integer without the ',' separating 1000s.
            cell: Backgrid.IntegerCell.extend({
                orderSeparator: ''
            })
        }, {
//            name: "manufacturer",
            name: "order_number",
            label: "Manufacturer",
            editable: false,
            // The cell type can be a reference of a Backgrid.Cell subclass, any Backgrid.Cell subclass instances like *id* above, or a string
            cell: "uri-id" // This is converted to "StringCell" and a corresponding class in the Backgrid package namespace is looked up
        }, {
            name: "customer",
            label: "Customer",
            editable: false,
            cell: "uri-id"
        }, {
            name: "dealer",
            label: "Dealer",
            editable: false,
            cell: "uri-id" // custom cell that wraps the content in an anchor tag that goes to the edit path
        }, {
            name: "amount",
            label: "Order Amount",
            editable: false,
            cell: "Number"
        }];

        // Initialize a new Grid instance
        var grid = new Backgrid.Grid({
            columns: columns,
            collection: App.orders
        });
        // Render the grid and attach the root to your HTML document
        var table_wrap = $('#table_wrap');
        table_wrap.append(grid.render().el);
        var paginator = new Backgrid.Extension.Paginator({
            collection: App.orders
        });
        // Initialize a client-side filter to filter on the client
        // mode pageable collection's cache.
        var filter = new Backgrid.Extension.ClientSideFilter({
            collection: App.orders,
            fields: ['name']
        });
        // Render the filter
        table_wrap.before(filter.render().el);
        // Add some space to the filter and move it to the right
        $(filter.el).css({float: "right", margin: "20px"});

        // Render the paginator
        table_wrap.after(paginator.render().el);

        App.orders.fetch({reset: true});
    </script>
@stop