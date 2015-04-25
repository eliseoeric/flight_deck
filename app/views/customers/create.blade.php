@extends('layouts._admin.default')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
        <li>{{ link_to_route('admin.customers.index', 'Customers') }}</li>
        <li><a href="#" class="active">New Customer</a></li>
    </ul>
@stop

@section('content')
    <div class="boiler">
        <div class="large-7">
            <div class="panel">
                <header class="panel-header">
                </header>
                {{ Form::open(['route' => 'admin.customers.store', 'method' => 'post']) }}
                <div class="row">
                    <div class="form-col-6">
                        <! -- Customer Name Form Input -->
                        <div class="form-group form-group-default">
                            {{ Form::label('name', 'Customer Name:') }}
                            {{ Form::text('name', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-col-6">
                        <! -- Address Input -->
                        <div class="form-group form-group-default">
                            {{ Form::label('address', 'Street Address:') }}
                            {{ Form::text('address', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-col-6">
                        <! -- Customer City Form Input -->
                        <div class="form-group form-group-default">
                            {{ Form::label('city', 'City:') }}
                            {{ Form::text('city', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-col-6">
                        <! -- zip Input -->
                        <div class="form-group form-group-default">
                            {{ Form::label('zipcode', 'Zipcode:') }}
                            {{ Form::select('zipcode', $zips, null, ['class' => 'form-control zipcode-select']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-col-6">
                        <! -- phone Form Input -->
                        <div class="form-group form-group-default">
                            {{ Form::label('phone', 'Phone Number:') }}
                            {{ Form::text('phone', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-col-6">
                        <! -- customer email Form Input -->
                        <div class="form-group form-group-default">
                            {{ Form::label('email', 'Email Address:') }}
                            {{ Form::text('email', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="">
                        <div class="medium primary rounded  btn">
                            {{ Form::submit('Add Customer', ['class' => '']) }}
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        <div class="large-4">
            <div class="panel ">
                <header class="panel-header">
                    <h3 class="panel-title">Purchase Orders</h3>
                </header>
                <div class="panel-body">
                    <h3>Purchase Orders at the touch of a button</h3>
                    <p>Fill out the form to the left to create a new purchse order.  Purchase orders can also be uploaded in bulk using our CSV importer below.</p>
                    <div class="medium secondary btn"><a href="">More</a></div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('backbone')
    <script>
        $(document).ready(function() {
            $('.form-control.zipcode-select').select2();
        })
    </script>
@stop