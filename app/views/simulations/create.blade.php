@extends('layouts.master')

@section('content')
		<!-- foreach($simulations as $simulation) {	
			$sim_ids_array[$simulation->id] = $simulation->title;
		} -->

	<h3>Budget Your Future</h3>
	
	<p><a id="newBudget" class="btn btn-primary popup" title="Budgets Are Important" data-container="body" data-toggle="popover" data-placement="top" data-content="They are the blueprint for financial success, please give your budget a name.">CREATE A NEW BUDGET</a></p>

<!-- Move to chart page -->
	 <!-- <p><a id="newExpense" class="btn btn-primary popup" title="Create multiple expenses."  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="This form can help you enter car payments, rent, insurance etc to plan a simulated budget. Each additional item will have a visable effect on the budget tracker.">NEW EXPENSE</a><p>


	  <p><a id="addIncome" class="btn btn-primary popup" title="Please tell us your income."  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="If you don't have an income be creative and come up with one.">CREATE AN INCOME</a><p>  -->

	{{ Form::open(array('action' => 'SimulationsController@store', 'class' => 'form-horizontal')) }}
		<div id='title1' class="form-group form-piece">
			<div class="col-md-4">
				{{ Form::text('title', null, array('placeholder' => 'Title for Budget 1', 'class' => 'form-control input_field', 'id' => 'simulation_title')) }}
			</div>
			<div class="col-md-2">
				<a id="step1btn" class="btn btn-primary popup" title="Congratulations You Now Have a Name for Your First Budget" data-container="body" data-toggle="popover" data-placement="right" data-content="We are going to create a series of transactions to simulate how a budget is created. First let's start with expenses. Please tell us what kind of expense you are creating, i.e, rent, car pmt, electric bill, etc.">STEP 1</a>
			</div>
		</div>

		<div id='expenseName1' class="form-group form-piece transaction_form">
			<div class="col-md-4">
				{{ Form::select('title', array('Rent' => 'Rent', 'Car Payment' => 'Car Payment', 'Electric Bill' => 'Electric Bill', 'Student Loans' => 'Student Loans', 'Insurance' => 'Insurance'), null, array('class' => 'form-control input_field', 'id' => 'transaction_title')) }}
			</div>
			
			<div class="col-md-2">
				<a id="step2btn" class="btn btn-primary popup" title="Great Job!" data-container="body" data-toggle="popover" data-placement="right" data-content="Now that we have an expense type, please tell us how much $$ the expense is per occurance. i.e., $349.56 ">STEP 2</a>
			</div>
		</div>


		<div id='expenseAmount1'class="form-group form-piece transaction_form">
			<div class="col-md-4">
				{{ Form::text('amount', null, array('placeholder' => 'Expense Amount','class' => 'form-control input_field', 'id' => 'transaction_amount')) }}
			</div>
			
			<div class="col-md-2">
				<a id="step3btn" class="btn btn-primary popup" title="Next we need to know how often your expense will occur." data-container="body" data-toggle="popover" data-placement="right" data-content="For example, annual, quarterly, monthly, bi-weekly, weekly or daily.">STEP 3</a>
			</div>
		</div>
		
		<div id="expense_type" class="form-group form-piece transaction_form">
			<div class="col-md-4">
				{{ Form::select('type', array('credit' => 'Credit', 'debit' => 'Debit'), null ,array('class' => 'form-control input_field', 'id' => 'transaction_type')) }}
			</div>
			
			<div class="col-md-2">
				<a id="step4btn" class="btn btn-primary popup" title="Gi">STEP $</a>
			</div>
		</div>
		
		<div id='expenseFrequency1' class="form-group form-piece transaction_form">
			<div class="col-md-4">
				{{ Form::select('frequency', array('daily' => 'Daily', 'weekly' => 'Weekly', 'monthly' => 'Monthly'), null, array('class' => 'form-control input_field', 'id' => 'transaction_frequency')) }}
			</div>
			
			<div class="col-md-2">
				<button id="submitExpensebtn" class="btn btn-primary popup" title="You are all finished creating the first expense for your simulated budget."  
				  data-container="body" data-toggle="popover" data-placement="right" 
				  data-content="You can either create another expense item or an income item " type="submit">
					Submit Expense
				</button>
			</div>
		</div>
	{{ Form::close() }}
<!-- Move to chart page -->
<!-- <div id='incomeAmount1'>

	
		{{ Form::text('title', null, array('placeholder' => 'Income Amount')) }}

		<p><a id="step4btn" class="btn btn-primary popup" title="What is your current income?"  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="Remember, this is a simulation so if you don't have any income you can make one up, i.e. $100,000.00">Step 4</a><p>
	

</div> 

<div id='incomeFrequency1'>

	
		{{ Form::text('title', null, array('placeholder' => 'Income Frequency')) }}

		<p><a id="step5btn" class="btn btn-primary popup" title="How often do you get paid?"  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="Most get paid on either a weekly, bi-week or monthly basis, please choose one of these options.">Submit Budget</a><p>
	

</div>  -->


<!-- Move to chart page as well -->
<!-- <div id='newExpenseName'>
	{{ Form::text('title', null, array('placeholder' => 'Expense Type')) }}
	
	<!-- <p><a id="step1btn" class="btn btn-primary popup" title="Great Job!"  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="Now that we have an expense type, please tell us how much $$ the expense is per occurance. i.e., $349.56 ">STEP 1</a><p> -->
<!-- </div>

<div id='newExpenseAmount'>

	
		{{ Form::text('title', null, array('placeholder' => 'Amount of Expense')) }}

	
		<p><a id="step3btn" class="btn btn-primary popup" title="Next we need to know how often your expense will occur."  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="For example, annual, quarterly, monthly, bi-weekly, weekly or daily.">STEP 2</a><p>
	

</div> -->

<!-- <div id='newExpenseFrequency'> -->

	
		<!-- {{ Form::text('title', null, array('placeholder' => 'Frequency')) }} -->

<!-- 		<p><a id="submitExpensebtn" class="btn btn-primary popup" title="Submit Expense."  
	  data-container="body" data-toggle="popover" data-placement="right" 
	  data-content="Create another expense. ">Submit Budget</a><p>
	

</div> --> 
@stop

@section('bottom-script')
  	<script>
		$( document ).ready(function() {
			var simulation_id;
			$('.form-piece').hide();
			
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

			function newExpense() {				
				$("#newExpenseName").slideDown(1000);
				$("#newExpenseAmount").slideDown(1000);
				$("#newExpenseFrequency").slideDown(1000);
				};
			function submitNewExpense(){

			}

			$('#newBudget').click(function() {
					title1();
				}); 

			$("#step1btn").click(function() {
				var dataString = 'title=' + $('#simulation_title').val();
				console.log(dataString);
				$.post("http://finance101.dev/simulations", dataString, function(data) {
					simulation_id = data.sim_id;
					console.log(simulation_id);
				});
				expenseName1();
			}); 

			$("#step2btn").click(function() {
				$("#expenseAmount1").slideDown(1000);
			}); 

			$("#step3btn").click(function() {
				$('#expense_type').slideDown(1000);
			});

			$('#step4btn').click(function () {
				$("#expenseFrequency1").slideDown(1000);
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
				$('.form-piece').hide();
				$('.transaction_form').slideDown(1000);
			}); 

			// $("#step3btn").click(function() {
			// 	$("#expenseFrequency1").slideDown(1000);
			// }); 
		 }); 
	</script>
@stop





