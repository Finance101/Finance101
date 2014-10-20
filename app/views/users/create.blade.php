@extends('layouts.master')

@section('content')
	<div class="progress">
		<div id="progress" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
			<span class="sr-only">60% Complete</span>
		</div>
	</div>

	{{ Form::open(array('action' => 'UsersController@store')) }}
		{{ Form::text('first_name', null, array('placeholder' => 'Enter your first name')) }}
		
		{{ Form::password('password', null, array('placeholder' => 'Enter your password')) }}
				
		{{ Form::text('last_name', null, array('placeholder' => 'Enter your last name')) }}
		
		{{ Form::text('email', null, array('placeholder' => 'Enter your eMail...')) }}
		
		{{ Form::submit() }}
	{{ Form::close() }}
@stop

@section('bottom-script')
@stop