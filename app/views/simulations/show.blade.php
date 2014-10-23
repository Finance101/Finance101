@extends('layouts.master')

@section('content')
	<h1>{{{ $simulation->title }}}</h1

	@foreach($simulation->transactions as $transaction)
		<h2>$transaction->title</h2>
	@endforeach
@stop