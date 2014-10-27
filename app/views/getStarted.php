@extends('layouts.master')

@section('content')
		<!-- foreach($simulations as $simulation) {	
			$sim_ids_array[$simulation->id] = $simulation->title;
		} -->
<html>
<head>
	<meta charset="utf-8">
	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 
   <!-- Bootstrap -->
   <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 
	<title></title>
</head>

<body>

	<h1>Welcome to Finance 101</h1>
	<h3>Budget Your Future</h3>

	<p><a id="newBudget" class="btn btn-primary popup" title="Budgets Are Important"  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="They are the blueprint for financial success, please give your budget a name.">CREATE A NEW BUDGET</a><p>


<div id='title1'>

	{{ Form::open(array('action' => 'SimulationsController@store')) }}
		{{ Form::text('title', null, array('placeholder' => 'Title for Budget 1')) }}

	
		<p><a id="step1btn" class="btn btn-primary popup" title="Congratulations You Now Have a Name for Your First Budget"  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="We are going to create a series of transactions to simulate how a budget is created. First let's start with expenses. Please tell us what kind of expense you are creating, i.e, rent, car pmt, electric bill, etc.">STEP 1</a><p>
	


</div>

<div id='expenseName1'>
	{{ Form::text('title', null, array('placeholder' => 'Expense Type')) }}
	
	<p><a id="step2btn" class="btn btn-primary popup" title="Great Job!"  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="Now that we have an expense type, please tell us how much $$ the expense is per occurance. i.e., $349.56 ">STEP 2</a><p>
</div>

<div id='expenseAmount1'>

	
		{{ Form::text('title', null, array('placeholder' => 'Amount of Expense')) }}

	
		<p><a id="step3btn" class="btn btn-primary popup" title="Next we need to know how often your expense will occur."  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="For example, annual, quarterly, monthly, bi-weekly, weekly or daily.">STEP 3</a><p>
	

</div>

<div id='expenseFrequency1'>

	
		{{ Form::text('title', null, array('placeholder' => 'Frequency')) }}

		<p><a id="submitExpensebtn" class="btn btn-primary popup" title="You are all finished creating the first expense for your simulated budget."  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="All you need to do is click submit and you can create and store multiple expenses as part of your budget. ">Submit Expense</a><p>
	

</div>

<div id='incomeAmount1'>

	
		{{ Form::text('title', null, array('placeholder' => 'Income Amount')) }}

		<p><a id="step4btn" class="btn btn-primary popup" title="What is your current income?"  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="Remember, this is a simulation so if you don't have any income you can make one up, i.e. $100,000.00">Step 4</a><p>
	

</div> 

</body>   

	  <script>

				  $( document ).ready(function() {
						$("#title1").hide();
						$("#transaction1").hide();
						$('#expenseName1').hide();
						$('#expenseAmount1').hide();
						$('#expenseFrequency1').hide();
						$('#incomeAmount1').hide();


					$('[data-toggle="popover"]').popover();

					$('body').on('click', function (e) {
						$('[data-toggle="popover"]').each(function () {
							//the 'is' for buttons that trigger popups
							//the 'has' for icons within a button that triggers a popup
							if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
								$(this).popover('hide');
							}
						});
					});
					
					function title1() {
						$("#title1").slideDown(1000);

						};

					function expenseName1() {
						$("#expenseName1").slideDown(1000);
						};

					$('#newBudget').click(function() {
							title1();
						}); 

					$("#step1btn").click(function() {

						expenseName1();
					}); 

					$("#step2btn").click(function() {
						$("#expenseAmount1").slideDown(1000);
					}); 

					$("#step3btn").click(function() {
						$("#expenseFrequency1").slideDown(1000);
					});

					$("#submitExpensebtn").click(function() {
						$("#title1").hide();
						$("#transaction1").hide();
						$('#expenseName1').hide();
						$('#expenseAmount1').hide();
						$('#expenseFrequency1').hide();
						$("#incomeAmount1").slideDown(1000);
					}); 

					// $("#step3btn").click(function() {
					// 	$("#expenseFrequency1").slideDown(1000);
					// }); 

				 }); 

				</script>




@stop





