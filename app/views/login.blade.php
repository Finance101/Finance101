@extends('layouts.master')

@section('title', 'Login')

@section('content')
	{{ Form::open(array('action' => 'HomeController@doLogin')) }}
		{{ Form::label('email', 'Email') }}
		
		{{ Form::text('email', Input::old('email'), array('placeholder' => 'Enter your account\'s email')) }}
		
		{{ Form::label('password', 'Password') }}
		
		{{ Form::password('password', null) }}

		{{ Form::submit() }}
	{{ Form::close() }}
@stop