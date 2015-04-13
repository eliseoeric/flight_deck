@extends('layouts._admin.default')

@section('breadcrumb')
<ul class="breadcrumb">
    <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
    <li><a href="#" class="active">Users</a>
    </li>
</ul>
@stop

@section('content')
<div class="boiler">
    <div class="deck-row">
        <div class="large-8">
            <div class="panel">

            </div>
        </div>
        <div class="large-4">
            <div class="panel ">
                <header class="panel-header">
                    <h3 class="panel-title">User Management</h3>
                </header>
                <div class="panel-body">
                    <h3>Create a New User</h3>
                    <p>Flight Deck allows you to have multiple users with multiple levels of access to your application and sales reports based on group permissions.</p>
                    <div class="medium secondary btn">{{ link_to_route('admin.users.create', 'New User') }}</div>
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


    App.users = new App.Collections.Users;

    var columns = [{
        name: "id", // The key of the model attribute
        label: "ID", // The name to display in the header
        editable: false, // By default every cell in a column is editable, but *ID* shouldn't be
        // Defines a cell type, and ID is displayed as an integer without the ',' separating 1000s.
        cell: Backgrid.IntegerCell.extend({
            orderSeparator: ''
        })
    }, {
        name: "username",
        label: "Username",
        editable: false,
        // The cell type can be a reference of a Backgrid.Cell subclass, any Backgrid.Cell subclass instances like *id* above, or a string
        cell: "uri-id" // This is converted to "StringCell" and a corresponding class in the Backgrid package namespace is looked up
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
        name: "email",
        label: "Email Address",
        editable: false,
        cell: "email" // custom cell that wraps the content in an anchor tag that goes to the edit path
    }, {
        name: "created_at",
        label: "Member Since",
        editable: false,
        cell: "string"
    }];

    // Initialize a new Grid instance
    var grid = new Backgrid.Grid({
        columns: columns,
        collection: App.users
    });

    // Render the grid and attach the root to your HTML document
    $("#table_wrap").append(grid.render().el);

    App.users.fetch({reset: true});
</script>
@stop
