@extends('layouts.master')

@section('title', 'New Simulation')

@section('content')
	{{ Form::open(array('action' => 'SimulationsController@store')) }}
		{{ Form::text('title', null, array('placeholder' => 'Title for simulation')) }}
	{{ Form::close() }}
@stop