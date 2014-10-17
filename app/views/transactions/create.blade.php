@extends('layouts.master') 


 
                <!-- Post Content -->
                  @section('top-script') 
                    <h1>Transactions Page</h1>
                  @stop

                  @section('content')

                   <div class="jumbotron">

                        <div class="progress progress-striped active">
                			<div class="progress-bar progress-success">
                			</div>
            			</div>
                        
                        {{ Form::open(array('action' => 'TransactionsController@store', 'class' => 'form-horizontal')) }}

	                        {{ Form::text('title', null, array('placeholder' => 'Enter title...')) }}
	                        
	                        {{ Form::select('frequency', array(
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


                            <!-- {{$errors->first('comment', '<span class="help-block">:message</span>')}} -->

                        <p>{{{""}}}</p>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        {{ Form::close() }} 
 					</div>
 				
					@stop


@section('bottom-script')
<script type="text/javascript">
    // 
 </script>





