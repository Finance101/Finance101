@extends('layouts.master')

@section('content')
	<h1>{{{ $simulation->title }}}</h1>

	<a href="{{ action('TransactionsController@create', $simulation->id) }}">Add transaction</a>

	@foreach($simulation->transaction as $transaction)
		<h2>{{{ $transaction->title }}}</h2>
	@endforeach
@stop