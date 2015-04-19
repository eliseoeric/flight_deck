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
                    dateTimeLabelFormats: {
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
            name: "manufacturer",
            label: "First Name",
            editable: false,
            // The cell type can be a reference of a Backgrid.Cell subclass, any Backgrid.Cell subclass instances like *id* above, or a string
            cell: "string" // This is converted to "StringCell" and a corresponding class in the Backgrid package namespace is looked up
        }, {
            name: "customer",
            label: "Customer Name",
            editable: false,
            cell: "string"
        }, {
            name: "dealer",
            label: "Email Address",
            editable: false,
            cell: "email" // custom cell that wraps the content in an anchor tag that goes to the edit path
        }, {
            name: "amount",
            label: "Total",
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
        // Render the paginator
        table_wrap.after(paginator.render().el);

        App.orders.fetch({reset: true});
    </script>
@stop