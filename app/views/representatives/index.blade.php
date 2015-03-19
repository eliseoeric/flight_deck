@extends('layouts._admin.default')

@section('content')
    <div class="large-11 medium-10 columns">
        <h1>Regions</h1>
        <div class="deck-row">
            <div class="large-5 columns panel">
                <p>Here you can create new Sales Reps or edit current Sales Reps.</p>
                {{ link_to_route('admin.regions.create', 'New Representative', array(), array('class' => 'button small')) }}
            </div>
        </div>
        <div class="deck-row">
            <div class="large-11 medium-10 columns">
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
        </div>
@stop