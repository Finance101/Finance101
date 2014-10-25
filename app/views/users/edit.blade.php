@extends('layouts.master')

@section('title', 'Edit a User')

@section('content')
    <div class="progress">
        <div id="progress" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
            <span class="sr-only">60% Complete</span>
        </div>
    </div>

    {{ Form::model($user, array('route' => 'users.update', $user->id), 'method' => 'PUT') }}
        {{ Form::text('first_name', $user->first_name, array('placeholder' => 'Enter your first name')) }}

        {{ Form::text('last_name', $user->last_name, array('placeholder' => 'Enter your last name')) }}

        {{ Form::email('email', $user->email, array('placeholder' => 'Enter your eMail...')) }}

        {{ Form::password('password', array('placeholder' => 'Enter your password')) }}

        {{ Form::submit() }}
    {{ Form::close() }}
@stop

@section('bottom-script')
@stop