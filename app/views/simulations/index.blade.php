@extends('layouts.master')

@section('content')
	@foreach($simulations as $simulation)
		<a href="{{ action('SimulationsController@show', $simulation->id) }}">{{{ $simulation->title }}}</a>
	@endforeach
@stop