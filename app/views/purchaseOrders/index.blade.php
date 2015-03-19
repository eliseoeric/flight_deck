@extends('layouts._admin.default')

@section('content')
    <div class="large-11 medium-10 columns">
        <h1>Regions</h1>
        <div class="deck-row">
            <div class="large-5 columns panel">
                <p>Here you can create new regions or edit current regions.</p>
                {{ link_to_route('admin.regions.create', 'New Region', array(), array('class' => 'button small')) }}
            </div>
        </div>
        <div class="deck-row">
            <div class="large-11 medium-10 columns">
                <table>
                    <thead>
                    <tr>
                        <th width="200">Order Number</th>
                        <th width="150">Customer</th>
                        <th width="150">Manufacturer</th>
                        <th width="150">Dealer</th>
                        <th width="150">Amount</th>
                        <th width="150">Created On</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($orders))
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{ link_to_route('admin.purchaseOrders.edit', $order->id, array($order->id))}}
                                </td>
                                <td>
                                    {{$order->customer->name}}
                                </td>
                                <td>
                                    {{$order->manufacturer->name}}
                                </td>
                                <td>
                                    {{$order->dealer->name}}
                                </td>
                                <td>
                                    {{$order->amount}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th width="200">Region</th>
                        <th width="150">Current Sales</th>
                        <th width="150">Sales Reps</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
@stop