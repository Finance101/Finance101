@extends('layouts.master')

@section('content')

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

	<script type="text/javascript" src="/js/Chart.min.js"></script>



	{{ Form::open(array('action' => 'SimulationsController@store')) }}
		{{ Form::text('title', null, array('placeholder' => 'Title for simulation')) }}
		{{ Form::submit() }}
	{{ Form::close() }}

	{{ Form::open(array('action' => 'TransactionsController@store', 'class' => 'form-horizontal')) }}
		    {{ Form::text('title', Input::old('title'), array('placeholder' => 'Enter title...')) }}
		   	
		   	{{$errors->first('title', '<span class="help-block">:message</span>')}} 
		    
		    {{ Form::select('frequency', array(
		    	'' => 'Frequency',
		    	'daily' => 'Daily',
		    	'weekly' => 'Weekly',
		    	'monthly' => 'Monthly'
		    ), array('placeholder' => 'Choose frequency...')) }}
		    
		    {{$errors->first('frequency', '<span class="help-block">:message</span>')}}
		    
		    {{ Form::number('amount', Input::old('amount'), array('step' => 'any', 'min' => '0', 'placeholder' => 'Enter amount')) }}
		    
		    {{$errors->first('amount', '<span class="help-block">:message</span>')}}
		    
		    {{ Form::select('type', array(
		    	'debit' => 'Debit',
		    	'credit' => 'Credit'
		    ), array('placeholder' => 'Enter type...')) }}
		    
		    {{$errors->first('type', '<span class="help-block">:message</span>')}}
		    	
		    {{ Form::select('simulation_id', array()) }}
		    
		    {{ Form::submit() }}
		{{ Form::close() }}
@stop