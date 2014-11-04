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

	<div class="col-md-10">
	<h3>Getting Started: <b>Creating A Budget</h3></b><br>
	<h4>Budgets are the blueprint for financial success.</h4>
		<p>Budgeting lies at the foundation of every financial plan. A budget is a plan for your future income and expenditures that you can use as a guideline for spending and saving.</p>
		<p>Unlike what you might believe, budgeting isn’t all about restricting what you spend money on and cutting out all the fun in your life. It’s really about understanding how much money you have, where it goes, and then planning how to best allocate those funds.</p>
		<p>Give your budget a name and then click ' + '. </p>
	
		
	    	<div id='title1'>
	        <label for="">Name</label> 
	        <input id="simulation_title" class='form-control input_field' data-progression="" type="text" placeholder="Example: Dream Budget, Future, Minimum Wage Budget" />
	   		</div>

	    	<div> 
	    	<label for=""></label>
	    	<button type="submit" data-toggle="notify" data-message="Budget Created Successfully!" data-options="{&quot;status&quot;:&quot;success&quot;}"class="btn btn-primary pull-right" id="step1btn" style="margin-top:30px"> + </button>
	    	</div>

	   		<br><br>
	   </div>
	   <div class="col-md-9">
	   <h4 style="padding:10px"><strong>Intro to Transactions</h4></strong>
   		<p style="padding:10px">Next we'll walk you through adding expenses to your budget.<p style="padding:10px">This form can help you enter car payments, rent, insurance etc to plan a simulated budget. Each additional item will have a visible effect on the budget simulator.</p>
   		<p style="padding:10px">Just remember, it is supposed to reflect potential spending habits and earning habits. If you’re not sure, don't worry you'll have more time later. </p>
	   	
	   	<div class="col-md-7"id="pieChart"></div>
	   	<div class="col-md-5">
	   	<form id="myform">
   		

    	<div id="expense_type" class="form-piece transaction_form">
		<label for="">Credit or Debit</label>
		<select class='form-control input_field' id="transaction_type" data-progression="" data-helper="Is this a credit or a debit transaction?" name="name" value="" placeholder="">
			<option value="credit">Credit</option>
			<option value="debit">Debit</option>
		</select>
		</div>

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
			<option value="daily">Daily</option>
			<option value="weekly">Weekly</option>
			<option value="monthly">Monthly</option>
		</select>
		</div>
		</form>

		<div>
		<input id="submitExpensebtn" type="submit" class="btn btn-success" style="margin-top:30px"/>
		</div>
		<br>
		<p>Done with transactions? </p><h4><a href="/simulations">Next: Compare My Budgets</a></h4>
		
	</div>
</div>

		
@stop

@section('bottom-script')
  	<script>
		var domain = '{{{ $_ENV['DOMAIN'] }}}';
		$( document ).ready(function() {
			var simulation_id,
				transactions = [];
			
			function displayPieChart () {
				var debits = [],
					income = 0,
					leftovers = 100,
					pieData = [];
				transactions.forEach(function (transaction, index, array) {
					var amount = 0;
					
					console.log(transaction.frequency);
					switch(transaction.frequency) {
						case 'daily' : 
							amount = transaction.amount * 30;
							break;
						case 'weekly' :
							amount = transaction.amount * 4;
							break;
						case 'monthly' :
							amount = transaction.amount;
							break;
					}
					console.log(amount);
					if (transaction.type == 'credit') {
						income += amount;
					} else {
						debits.push(transaction);
					}
				});
				debits.forEach(function (debit, index, array) {
					var share = Math.round(debit.amount * 100 / income)
					var newData = [debit.title, share];
					leftovers -= share;
					pieData.push(
						newData
					);
				});
				pieData.push(['Surplus', leftovers]);
				// Pie chart
				$('#pieChart').highcharts({
						chart: {
							plotBackgroundColor: null,
							plotBorderWidth: 1,//null,
							plotShadow: false
						},
						title: {
							text: 'How this budget is split'
						},
						tooltip: {
							pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
						},
						plotOptions: {
							pie: {
								allowPointSelect: true,
								cursor: 'pointer',
								dataLabels: {
									enabled: true,
									format: '<b>{point.name}</b>: {point.percentage:.1f} %',
									style: {
										color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
									}
								}
							}
						},
						series: [{
							type: 'pie',
							name: 'Income',
							data: pieData
						}]
					});
			}	
			$("#step1btn").click(function(e) {
				console.log('Step 1 Button clicked');
				e.preventDefault();
				var dataString = 'title=' + $('#simulation_title').val();
				console.log(dataString);
				$.post(domain + 'simulations', dataString, function(data) {
					simulation_id = data.sim_id;
					console.log(simulation_id);
				});
			}); 
			
			$("#submitExpensebtn").click(function(e) {
				e.preventDefault();
				var newTitle = $('#transaction_title').val(),
					newAmount = $('#transaction_amount').val(),
					newType = $('#transaction_type').val(),
					newFrequency = $('#transaction_frequency').val();
				//make datastring with columns for transactions table
				var dataString = 'title=' + newTitle + '&amount=' + newAmount + '&type=' + newType + '&frequency=' + newFrequency + '&simulation_id=' + simulation_id;
				//include simulation_id
				console.log(dataString);
				$.post(domain + 'transactions', dataString, function(data) {
					console.log(data.message);
					console.log(data.approx_daily)
					transactions.push({
						'id' : data.newId,
						'title' : newTitle,
						'amount' : newAmount,
						'type' : newType,
						'frequency' : newFrequency
					});
				});
				
				displayPieChart();
				$('.input_field').val('');
			
			}); 
			
		 }); 
	</script>
@stop
