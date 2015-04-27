@extends('layouts.default')


@section('projection')
    <div class="wrapper shaded" >
    @include('layouts._partials.nav', array('negative' => false))
        {{ Form::open(['route' => 'orderForm', 'method' => 'post', 'class' => 'form-horizontal', 'files'=>true]) }}
        <div class="row">
            <section class="tabs">
                <ul class="tab-nav centered eight columns mg-t-30">
                    <li class="active"><a href="#">First Tab</a></li>
                    <li> <a href="#">Second Tab</a></li>
                    <li><a href="#">Third Tab</a></li>
                </ul>
                <div class="tab-content active">
                    <div class="panel widget centered eight columns">
                        <div class="panel-header">
                            <h3 class="panel-title">Purchase Order Form</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <p>Please fill out the form below to record a purchase order.</p>
                            </div>
                            <div class="form-group row">
                                <! -- Order Number Form Input -->
                                <div class="columns three">
                                    {{ Form::label('order_number', 'Order Number:', ['class' => 'control-label']) }}
                                </div>
                                <div class="columns nine">
                                    {{ Form::text('order_number', null, ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <! -- Order Amount Form Input -->
                                <div class="columns three">
                                    {{ Form::label('amount', 'Order Amount:', ['class' => 'control-label']) }}
                                </div>
                                <div class="columns nine">
                                    {{ Form::text('amount', null, ['class' => 'form-control'])}}
                                    <span class="input-group-addon">USD</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <! -- Customer Form Input -->
                                <div class="columns three">
                                    {{ Form::label('customer_id', 'Order Customer:', ['class' => 'control-label']) }}
                                </div>
                                <div class="columns nine">
                                    {{ Form::select('customer_id', $customers, null, ['class' => 'form-control customer-select']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <! -- Manufacturer Form Input -->
                                <div class="columns three">
                                    {{ Form::label('manufacturer_id', 'Order Manufacturer:', ['class' => 'control-label']) }}
                                </div>
                                <div class="columns nine">
                                    {{ Form::select('manufacturer_id', $manufacturers, null, ['class' => 'form-control manufacturer-select']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <! -- Dealer Form Input -->
                                <div class="columns three">
                                    {{ Form::label('dealer_id', 'Order Dealer:', ['class' => 'control-label']) }}
                                </div>
                                <div class="columns nine">
                                    {{ Form::select('dealer_id', $dealers, null, ['class' => 'form-control dealers-select']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="panel widget centered eight columns">
                        <div class="panel-header">
                            <h3 class="panel-title">Purchase Order Upload Tool</h3>
                        </div>
                        <div class="panel-body">
                            <p>Upload a .CSV file of multiple purchase orders to quickly update the database.</p>
                            <div class="form-group row">
                                <! -- Order CSV Form Input -->
                                <div class="columns three">
                                    {{ Form::label('file', '.CSV File:', ['class' => 'control-label']) }}
                                </div>
                                <div class="columns nine">
                                    {{ Form::file('file', null, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="columns eight centered mg-t-10 mg-b-50">
                <div class="large metro info rounded btn right-align m-l-5">
                    {{ Form::reset('Clear') }}
                    {{--<a href="#"><i class="fa fa-times"></i> Clear</a>--}}
                </div>
                <div class="large metro primary rounded btn right-align">
                    {{ Form::submit('Place Order', ['class' => '']) }}
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@stop
@section('content')
    <div class="wrapper dark-bg">
        <div class="row">
            <div class="six columns">
                <p class="negative">Quick Access Links: </p>
                <div class="btn primary"><a target="" href="/admin/">Dashboard</a></div>
                <div class="btn primary"><a target="" href="/admin/representatives/">Representatives</a></div>
                <div class="btn primary"><a target="" href="/admin/purchaseOrders/">Purchase Orders</a></div>
                <p class="negative mg-t-10">Hand-crafted with <strong>pride</strong> by your friends at <a href="http://www.thinkgeneric.com/" target="_blank" title="ThinkGeneric">ThinkGeneric</a></p>
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