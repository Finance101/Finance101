@extends('layouts.master')
@section('top-script')

<link href='/vendor/progression/progression.min.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/progression/progression.js"></script>
	
	<script>
	jQuery(document).ready(function($) {
		$("#myform").progression({
		  tooltipWidth: '200',
		  tooltipPosition: 'right',
		  tooltipOffset: '50',
		  showProgressBar: true,
		  showHelper: true,
		  tooltipFontSize: '14',
		  tooltipFontColor: 'fff',
		  progressBarBackground: 'fff',
		  progressBarColor: '6EA5E1',
		  tooltipBackgroundColor:'FFCC33',
		  tooltipPadding: '10',
		  tooltipAnimate: true
		});
	});
	</script>
@stop

@section('content')
		<!-- foreach($simulations as $simulation) {	
			$sim_ids_array[$simulation->id] = $simulation->title;
		} -->
<div class="container-fluid">
	
	<h3>Getting Started: Creating A Budget</h3><br>
	<h4>Budgets are the blueprint for financial success.</h4>
		<p>This form can help you enter car payments, rent, insurance etc to plan a simulated budget. Each additional item will have a visible effect on the budget tracker.
		Let's get going.</p>
	
			
	{{ Form::open(array('action' => 'SimulationsController@store', 'class' => 'form-horizontal', 'id'=>'myform')) }}
    	<div id='title1'>
        <label for="">Name</label> 
        <input id="simulation_title" class='form-control input_field' data-progression="" type="text" data-helper="First name your budget! Be creative! Try: First Time On My Own, or Dream Budget" placeholder="" />
   		</div>

    	<div> 	
    	<input type="submit" class="btn btn-primary pull-right" id="step1btn" style="margin-top:30px"></input>
   		</div>
   		<br><br>
   		<hr>

   		<h4>Intro to Transactions</h4>
   		<p>Next we'll walk you through adding your first expense to your budget.</p>
    	<div id='expenseName1' class="form-piece transaction_form">
		<label for="">Type</label>
		<select id="transaction_title"class='form-control input_field' data-progression="" type="multiple-select" data-helper="We are going to create a series of transactions to simulate how a budget is created. First, start with expenses. Please tell us what kind of expense you currently have." name="name" value="" placeholder="">
			<option>Rent</option>
			<option>Car Payment</option>
			<option>Electric Bill</option>
			<option>Student Loans</option>
			<option>Insurance</option>
		</select>
		</div>
		
		<div id='expenseAmount1'class="form-piece transaction_form">
		<label for="">Amount of Expense</label>
		<input data-progression="" data-helper="Now that we have an expense type, please tell us how much $$ the expense is per occurance. i.e., $349.56" type="text" id="transaction_amount" placeholder='Expense Amount' class='form-control input_field'>
		</div>

		<div id='expenseFrequency1' class="form-piece transaction_form">
		<label for="">Frequency</label>
		<select class ='form-control input_field' id="transaction_frequency" data-progression="" type="multiple-select" data-helper="We are going to create a series of transactions to simulate how a budget is created. First, start with expenses. Please tell us what kind of expense you currently have." name="expenseFrequency1" value="" placeholder="">
			<option>Daily</option>
			<option>Weekly</option>
			<option>Monthly</option>
		</select>
		</div>

		<div id="expense_type" class="form-piece transaction_form">
		<label for="">Credit or Debit</label>
		<select class='form-control input_field' id="transaction_type" data-progression="" data-helper="Last step! Is this a credit or a debit transaction?" name="name" value="" placeholder="">
			<option>Credit</option>
			<option>Debit</option>
		</div>
		
		<div>
		<input id="submitExpensebtn" type="submit" class="btn btn-success pull-right" style="margin-top:30px"/>
		</div>	
		
</div>				
{{ Form::close() }}

@stop

@section('bottom-script')
  	<script>
		$( document ).ready(function() {
			var simulation_id;
			function submitNewExpense(){
			} 
			$("#step1btn").click(function() {
				var dataString = 'title=' + $('#simulation_title').val();
				console.log(dataString);
				$.post("http://finance101.dev/simulations", dataString, function(data) {
					simulation_id = data.sim_id;
					console.log(simulation_id);
				});
				expenseName1();
			}); 
			
			$("#submitExpensebtn").click(function(e) {
				e.preventDefault();
				//make datastring with columns for transactions table
				var dataString = 'title=' + $('#transaction_title').val() + '&amount=' + $('#transaction_amount').val() + '&type=' + $('#transaction_type').val() + '&frequency=' + $('#transaction_frequency').val() + '&simulation_id=' + simulation_id;
				//include simulation_id
				console.log(dataString);
				$.post('http://finance101.dev/transactions', dataString, function(data) {
					console.log(data.message);
					console.log(data.approx_daily)
				});
				
				$('.input_field').val('');
			
			}); 
			
		 }); 
	</script>
@stop





