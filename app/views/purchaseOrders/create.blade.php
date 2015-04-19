@extends('layouts._admin.default')
@include('layouts._partials.errors')
@section('breadcrumb')
    <ul class="breadcrumb">
        <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
        <li>{{ link_to_route('admin.purchaseOrders.index', 'Purchase Orders') }}</li>
        <li><a href="#" class="active">New Purchase Order</a></li>
    </ul>
@stop

@section('content')
    <div class="boiler">
        <div class="large-7">
            <div class="panel">
                <header class="panel-header">
                </header>
                {{ Form::open(['route' => 'admin.purchaseOrders.store', 'method' => 'post']) }}
                <div class="row">
                    <div class="form-col-6">
                        <! -- Order Number Form Input -->
                        <div class="form-group form-group-default">
                            {{ Form::label('order_number', 'Order Number:') }}
                            {{ Form::text('order_number', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="form-col-6">
                        <! -- Amount Form Input -->
                        <div class="form-group form-group-default">
                            {{ Form::label('amount', 'Amount:') }}
                            {{ Form::text('amount', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-col-6">
                        <! -- Customer Form Input -->
                        <div class="form-group form-group-default">
                            {{ Form::label('customer_id', 'Customer:') }}
                            {{ Form::select('customer_id', $customers, null, ['class' => 'form-control customer-select']) }}
                        </div>
                    </div>
                    <div class="form-col-6">
                        <! -- Manufacturer Form Input -->
                        <div class="form-group form-group-default">
                            {{ Form::label('manufacturer_id', 'Manufacturer:') }}
                            {{ Form::select('manufacturer_id', $manufacturers, null, ['class' => 'form-control manufacturer-select']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-col-6">
                        <! -- Dealer Form Input -->
                        <div class="form-group form-group-default">
                            {{ Form::label('dealer_id', 'Dealer:') }}
                            {{ Form::select('dealer_id', $dealers, null, ['class' => 'form-control dealers-select']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="">
                        <div class="medium primary rounded  btn">
                            {{ Form::submit('Place Order', ['class' => '']) }}
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
        $('.form-control.dealers-select').select2();
        $('.form-control.manufacturer-select').select2();
        $('.form-control.customer-select').select2();
    })
    </script>
@stop