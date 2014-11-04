@extends('layouts.master')

@section('content')
	<h2>Budget | {{{ $simulation->title }}}</h2>
	<p>Here is an individual break down of a budget.</p>
	<p>Look through your budget and all your receipts. Can you find an expense that can be cut?</p>
	<p>Maybe you could bring your lunch to work twice a week, or set up a carpool with a friend.</p>
	<p> Just c­utting out restaurant and gas costs can help increase the amount of money you have available for savings and purchases.</p>
	<!-- datepicker -->
	<div class="col-md-4 datetimepicker input-group date mb-lg">
   	<input type="text" class="form-control" id="toDatePicker" placeholder='Projection Date'></input>
       <span class="input-group-addon">
       <span class="fa fa-calendar"></span>
       </span>
   </div></div>
   <!-- charts -->
	<div class="row">
	<div class="col-md-5" id="chartDisplay"></div>
	<div class="col-md-5" id="pieChart"></div>
	</div>

	<!-- START panel-->
	<div class="col-md-10">
   <div id="panel-2" class="panel panel-green">
   <div class="panel-heading portlet-handler">Transactions</div>
   <div class="panel-body">
   <table id="transactions-table" class="table table-striped">
		<tr>
			<th>Title</th>
			<th>Amount</th>
			<th>Type</th>
			<th>Frequency</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		
		@foreach($simulation->transaction as $transaction)
			<tr data-transactionId='{{ $transaction->id }}'>
				<td class="transaction-title">{{{ $transaction->title }}}</td>
				<td class="transaction-amount">{{{ $transaction->amount }}}</td>
				<td class="transaction-type">{{{ $transaction->type }}}</td>
				<td class="transaction-frequency">{{{ $transaction->frequency }}}</td>
				<td><button class="edit-button btn btn-primary btn-xs" data-transactionId='{{ $transaction->id }}'><i class="fa fa-pencil"></i></button></td>
				<td><button class='delete-button btn btn-danger btn-xs' data-transactionId='{{ $transaction->id }}'><i class="fa fa-trash-o "></i></button></td>
			</tr>
		@endforeach
	</table>
	<br><br>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#transactions-create">
		New Transaction
	</button>
</div>
 </div>
 </div>
<!-- END panel-->
	

	<h1>definition of <a data-toggle="modal" data-target="#creditDefinition">credit</a> </h1>

	

@stop

@section('bottom-script')
	<script type="text/javascript">
		$(document).ready(function () {
			var startDate = moment('{{{ $simulation->user->created_at }}}'),
				endDate = moment(),
				distance,
				chart,
				simulations = [{
					'title' : '{{{ $simulation->title }}}',
					'approx_daily_value' : {{{ $simulation->approx_daily_value }}}
				}],
				domain = '{{{ $_ENV['DOMAIN'] }}}',
				transactions = [],
				simulation_id = {{{ $simulation->id }}},
				editId;
				
				@foreach($simulation->transaction as $transaction)
					transactions.push({
							'id' : '{{{ $transaction->id }}}',
							'title' : '{{{ $transaction->title }}}',
							'amount' : '{{{ $transaction->amount }}}',
							'type' : '{{{ $transaction->type }}}',
							'frequency' : '{{{ $transaction->frequency }}}',
					});
				@endforeach

			// New transaction button
			$('#new-transaction-submit').click(function () {
				var newTitle = $('#transaction-new-title').val(),
					newAmount = $('#transaction-new-amount').val(),
					newType = $('#transaction-new-type').val(),
					newFrequency = $('#transacton-new-frequency').val(),
					newId,
					dataString = 'title=' + newTitle + '&amount=' + newAmount + '&type=' + newType + '&frequency=' + newFrequency + '&simulation_id=' + simulation_id;
				console.log(dataString);
				$.post(domain + 'transactions', dataString, function (data) {
					if (data.success) {
						console.log(data.message);
						console.log(data.newId);
						newId = data.newId;
						console.log(data.approx_daily);
						simulations[0].approx_daily_value = data.approx_daily;
						displayLineGraph();
						$('#transactions-table').append(
							'<tr data-transactionId=' + newId + '><td class="transaction-title">' + newTitle + '</td><td class="transaction-amount">' + newAmount + '</td><td class="transaction-type">' + newType + '</td><td class="transaction-frequency">' + newFrequency + '</td><td><button class="edit-button btn btn-primary btn-xs" data-transactionId=' + newId + '><i class="fa fa-pencil"></i></button></td><td><button class="delete-button delete-button btn btn-danger btn-xs" data-transactionId=' + newId + '><i class="fa fa-trash-o "></i></button></td></tr>');
						$('.delete-button').click(attemptDelete);
						$('.edit-button').click(attemptEdit);
					}
				});
				$('#transactions-create').modal('hide');
				// update table

				
				// update line graph


				// update pie graph
				transactions.push({
					'id' : newId,
					'title' : newTitle,
					'amount' : newAmount,
					'type' : newType,
					'frequency' : newFrequency
				});
				displayPieChart();
			});

			// Calculates total monthly income and creates array of debits so that debits can be represented as a share of income in the pie chart
			function displayPieChart () {
				var debits = [],
					income = 0,
					leftovers = 100,
					pieData = [];
				transactions.forEach(function (transaction, index, array) {
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

			function attemptDelete() {
				var id;
				if(confirm('Delete This Transaction?')) {
					id = $(this).attr('data-transactionId');
					console.log(id);
					$.ajax({
						url : domain + 'transactions/' + id,
						type : 'post',
						data : {
							_method : 'delete'
						},
						success : function (data) {
							console.log(data.message);
							console.log(data.approx_daily);
							simulations[0].approx_daily_value = data.approx_daily;
						}
					});
					$('tr[data-transactionId=' + id + ']').remove();
					// update line graph
					transactions.forEach(function (transaction, index, array) {
						if (transaction.id == id) {
							array.splice(index, 1);
							console.log(transactions);
						}
					});
					displayLineGraph();

					// update pie graph
					displayPieChart();
				}
			}

			// Delete button
			$('.delete-button').click(attemptDelete);

			// Edit button
			$('.edit-button').click(function () {
				editId = $(this).attr('data-transactionId');
				// Set modal inputs equal to current values
				var tableEntry = $('tr[data-transactionId=' + editId + ']');
				$('#transaction-edit-amount').val(tableEntry.children('.transaction-amount').text());
				$('#transaction-edit-title').val(tableEntry.children('.transaction-title').text());
				$('#transacton-edit-frequency').val(tableEntry.children('.transaction-frequency').text());
				$('#transaction-edit-type').val(tableEntry.children('.transaction-type').text());
				// Display edit modal
				$('#transactions-edit').modal();
			});

			function attemptEdit () {
				var newTitle = $('#transaction-edit-title').val(),
				newAmount =  $('#transaction-edit-amount').val(),
				newType = $('#transaction-edit-type').val(),
				newFrequency = $('#transacton-edit-frequency').val();

				$.ajax({
						url : domain + 'transactions/' + editId,
						type : 'post',
						data : {
							'_method' : 'put',
							'title' :  newTitle,
							'amount' : newAmount,
							'type' : newType,
							'frequency' : newFrequency,
							'simulation_id' : simulation_id
						},
						success : function (data) {
							var dataEntry;

							if (data.success) {
								console.log(data.message);
								
								$('#transactions-edit').modal('hide');
								// update table
								dataEntry = $('tr[data-transactionId=' + data.id + ']');
								dataEntry.children('.transaction-title').text(newTitle);
								dataEntry.children('.transaction-amount').text(newAmount);
								dataEntry.children('.transaction-type').text(newType);
								dataEntry.children('.transaction-frequency').text(newFrequency);
								// update line graph
								transactions.forEach(function (transaction, element, array) {
									if (transaction.id == data.id) {
										transaction.amount = newAmount;
										transaction.type = newType;
										transaction.frequency = newFrequency;
										transaction.title = newTitle;
									}
								});
								displayLineGraph();
								// update pie graph
								displayPieChart();
							} else {
								console.log(data.message);
							}
						}
					});
			}
			//Edit modal submit
			$('#transaction-edit-submit').click(attemptEdit);

			// Projection date picker
			$( "#toDatePicker" ).datetimepicker();

			// Line chart starting display
			$('#chartDisplay').highcharts({
					chart: {
						type: 'area'
					},
					title: {
						text: 'Forecast'
					},
					xAxis: {
						categories: ['Pick a Date']
					},
					yAxis: {
						title: {
							text: 'USD'
						}
					},
					plotOptions: {
						line: {
							dataLabels: {
								enabled: true
							},
							enableMouseTracking: true
						}
					},
					series: ['Pick a Date']
				});
			
			function displayLineGraph () {
				const CHART_INTERVALS = 10;
				var chartCategories = [],
					chartSeries = [],
					dayCount = [],
					distance;				
				distance = endDate.diff(startDate, 'days');
				for(var i = 1; i <= CHART_INTERVALS; i++) {
					dayCount.push(Math.round(distance * i / CHART_INTERVALS));
				}
				dayCount.forEach(function (day, index, array) {
					var newDate = moment(startDate);
					newDate.add(day, 'days');
					chartCategories.push(newDate.format('M-D-YY'));
				});		
				simulations.forEach(function (simulation, index, array) {
					var dataPoints = [];
					dayCount.forEach(function (day, index, array) {
						dataPoints.push(simulation.approx_daily_value * day);
					});
					chartSeries.push({
						'name' : simulation.title, 
						'data' : dataPoints
					});
				});
				$('#chartDisplay').highcharts({
					chart: {
						type: 'area'
					},
					title: {
						text: 'Forecast'
					},
					xAxis: {
						categories: chartCategories
					},
					yAxis: {
						title: {
							text: 'USD'
						}
					},
					plotOptions: {
						line: {
							dataLabels: {
								enabled: true
							},
							enableMouseTracking: true
						}
					},
					series: chartSeries
				});
			}

			// Date picker event handler updating line chart
			$('#toDatePicker').on('dp.change', function () {
				endDate = moment($(this).data("DateTimePicker").getDate());
				displayLineGraph();
			});

			displayLineGraph();
			displayPieChart();
		});	
	</script>
@stop

@section('modals')

<div class="modal fade" id="creditDefinition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">New Transaction</h4>
	      </div>
	      <div class="modal-body">
	      <h1>Definition of "Credit"</h1>
	      <h4>1. A contractual agreement in which a borrower receives something of value now and agrees to repay the lender at some date in the future, generally with interest. The term also refers to the borrowing capacity of an individual or company. 

			2. An accounting entry that either decreases assets or increases liabilities and equity on the company's balance sheet. On the company's income statement, a debit will reduce net income, while a credit will increase net income.</h4>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>



	<!-- Modal -->
	<div class="modal fade" id="transactions-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">New Transaction</h4>
	      </div>
	      <div class="modal-body">
				<input type="text" name="transaction-new-title" id="transaction-new-title" placeholder="Name of New Transaction">			   	
			    
				<select id="transacton-new-frequency" name="transaction-new-frequency">
					<option value="">Frequency</option>
					<option value="daily">Daily</option>
					<option value="weekly">Weekly</option>
					<option value="monthly">Monthly</option>
				</select>
			    
				<input type="number" name="transaction-new-amount" id="transaction-new-amount" step="any" min="0" placeholder="Enter Amount">

				<select id="transaction-new-type" name="transaction-new-type">
					<option value="">Credit/Debit</option>
					<option value="credit">Credit</option>
					<option value="debit">Debit</option>
				</select>			    
			    	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" id="new-transaction-submit" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="transactions-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">New Transaction</h4>
	      </div>
	      <div class="modal-body">
				<input type="text" name="transaction-edit-title" id="transaction-edit-title" placeholder="Name of New Transaction">			   	
			    
				<select name="transaction-edit-frequency" id="transacton-edit-frequency">
					<option value="">Frequency</option>
					<option value="daily">Daily</option>
					<option value="weekly">Weekly</option>
					<option value="monthly">Monthly</option>
				</select>
			    
				<input type="number" name="transaction-edit-amount" id="transaction-edit-amount" step="any" min="0" placeholder="Enter Amount">

				<select id="transaction-edit-type" name="transaction-edit-amount">
					<option value="">Credit/Debit</option>
					<option value="credit">Credit</option>
					<option value="debit">Debit</option>
				</select>			    
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" id="transaction-edit-submit" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
@stop