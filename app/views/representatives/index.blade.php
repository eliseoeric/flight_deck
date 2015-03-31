@extends('layouts._admin.default')

@section('content')
    @include('layouts._admin.herocrumb')
    <div class="boiler">
        <div class="deck-row">
            <div class="large-7">
                <div class="panel">
                    <div class="panel-body text-center">
                        {{ HTML::image('img/tables.jpg') }}
                    </div>
                </div>
            </div>
            <div class="large-5">
                <div class="panel">
                    <header class="panel-header">
                        <h3 class="panel-title">
                            Getting Started
                        </h3>
                    </header>
                    <div class="panel-body">
                        <h3>Create a New Representative</h3>
                        <p>Flight Deck let's you easily create and manage your sales reps via our simple user friendly tables. Get started now by creating a new rep and see what all the fuss is about.</p>
                        <div class="medium secondary btn">{{ link_to_route('admin.representatives.create', 'New Representative') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="deck-row turbine">
            <div class="large-12">
                <table>
                    <thead>
                    <tr>
                        <th width="200">Representative</th>
                        <th width="200">Phone Number</th>
                        <th width="150">Regions</th>
                        <th width="150">Current Sales</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($reps))
                        @foreach($reps as $rep)
                            <tr>
                                <td>{{ link_to_route('admin.representatives.edit', $rep->first_name . ' ' .$rep->last_name, array($rep->id))}}</td>
                                <td>
                                    {{$rep->phone}}
                                </td>
                                <td>
                                    @foreach($rep->regions as $region)
                                        {{ link_to_route('admin.regions.edit', $region->region, array($region->id))}}
                                    @endforeach
                                </td>
                                <td>
                                    {{$rep->net_sales}}
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

@stop