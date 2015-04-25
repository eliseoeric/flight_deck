@extends('layouts._admin.default')

@section('breadcrumb')
    <ul class="breadcrumb">
        <li>{{ link_to_route('admin.index', 'Dashboard') }}</li>
        <li>{{ link_to_route('admin.regions.index', 'Regions') }}</li>
        <li><a href="#" class="active">{{ $region->region }}</a></li>
    </ul>
@stop