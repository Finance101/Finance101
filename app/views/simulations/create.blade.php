@extends('layouts.master')

@section('content')
	{{ Form::open(array('action' => 'SimulationsController@store')) }}
		{{ Form::text('title', null, array('placeholder' => 'Title for simulation')) }}
		{{ Form::submit() }}
	{{ Form::close() }}
@stop