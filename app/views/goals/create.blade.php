@extends('layouts.master')

@section('title', 'New Goal')

@section('content')
	{{ Form::open(array('action' => 'GoalsController@store')) }}
		{{ Form::text('title', null, array('placeholder' => 'Title') }}
		{{ Form::number('value', null, array('placeholder' => 'Money')) }}
		{{ Form::submit() }}
	{{ Form::close() }}	
@stop