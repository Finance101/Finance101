@extends('layouts.master') 

@section('content')
	<h1>Transactions Page</h1>

	<div class="jumbotron">
		<div class="progress">
			<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
			    60%
			</div>
		</div>

		{{ Form::open(array('action' => 'TransactionsController@store', 'class' => 'form-horizontal')) }}
		    {{ Form::text('title', null, array('placeholder' => 'Enter title...')) }}
		    
		    {{ Form::select('frequency', array(
		    	'' => 'Frequency',
		    	'daily' => 'Daily',
		    	'weekly' => 'Weekly',
		    	'monthly' => 'Monthly'
		    ), array('placeholder' => 'Choose frequency...')) }}
		    
		    {{ Form::number('amount', null, array('step' => 'any', 'min' => '0', 'placeholder' => 'Enter amount')) }}
		    
		    {{ Form::select('type', array(
		    	'debit' => 'Debit',
		    	'credit' => 'Credit'
		    ), array('placeholder' => 'Enter type...')) }}

		    {{ Form::submit() }}
		{{ Form::close() }}
	</div>
@stop