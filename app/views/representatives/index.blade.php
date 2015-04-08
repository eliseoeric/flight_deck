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
                        <div class="panel widget counter">
                            <header class="panel-header">
                                <h3 class="panel-title">Top Earner <i class="fa fa-chevron-right"></i></h3>
                            </header>
                            <div class="panel-body">
                                <h3 class="value">$16,000</h3>
                                <p class="hint"><span class="default label">$2,150</span> until goal</p>
                            </div>
                        </div>
                        <div class="panel widget counter">
                            <header class="panel-header">
                                <h3 class="panel-title">Top Earner <i class="fa fa-chevron-right"></i></h3>
                            </header>
                            <div class="panel-body">
                                <h3 class="value">$16,000</h3>
                                <p class="hint"><span class="default label">$2,150</span> until goal</p>
                            </div>
                        </div>
                        <div class="panel widget counter">
                            <header class="panel-header">
                                <h3 class="panel-title">Top Earner <i class="fa fa-chevron-right"></i></h3>
                            </header>
                            <div class="panel-body">
                                <h3 class="value">$16,000</h3>
                                <p class="hint"><span class="default label">$2,150</span> until goal</p>
                            </div>
                        </div>
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
            // The cell type can be a reference of a Backgrid.Cell subclass, any Backgrid.Cell subclass instances like *id* above, or a string
            cell: "string" // This is converted to "StringCell" and a corresponding class in the Backgrid package namespace is looked up
        }, {
            name: "last_name",
            label: "Last Name",
            cell: "string" // An integer cell is a number cell that displays humanized integers
        }, {
            name: "email",
            label: "Email Address",
            cell: "email" // A cell type for floating point value, defaults to have a precision 2 decimal numbers
        }, {
            name: "net_sales",
            label: "Current Sales",
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