@extends('layouts._admin.default')

@section('content')
    <div class="large-11 medium-10 columns">
        <h1>Users</h1>
        <div class="deck-row">
            <div class="large-5 columns panel">
                <p>Here you can create new Users or edit current Users.</p>
                {{ link_to_route('admin.users.create', 'New User', array(), array('class' => 'button small')) }}
            </div>
        </div>
        <div class="deck-row"></div>
            <div class="large-11 medium-10 columns">
                <table>
                    <thead>
                    <tr>
                        <th width="200">Username</th>
                        <th width="150">First Name</th>
                        <th width="150">Last Name</th>
                        <th width="150">Email</th>
                        <th width="150">Activated</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($users))
                        @foreach($users as $user)
                            <tr>
                                <td>{{ link_to_route('admin.users.edit', $user->username, array($user->id))}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->isActivated()}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="200">Username</th>
                            <th width="150">First Name</th>
                            <th width="150">Last Name</th>
                            <th width="150">Email</th>
                            <th width="150">Activated</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
@stop