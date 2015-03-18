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
                        <th width="200">Region</th>
                        <th width="150">Current Sales</th>
                        <th width="150">Sales Reps</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($regions))
                        @foreach($regions as $region)
                            <tr>
                                <td>{{ link_to_route('admin.regions.edit', $region->region, array($region->id))}}</td>
                                <td></td>
                                <td>
                                    @foreach($region->representatives as $rep)
                                        {{$rep->first_name}},
                                    @endforeach
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