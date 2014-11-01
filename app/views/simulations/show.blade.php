@extends('layouts.master')

@section('content')
	<h1>{{{ $simulation->title }}}</h1>

	<input type='text' id="toDatePicker" placeholder='Projection Date'>
	
	<div id="chartDisplay"></div>

	<div id="pieChart"></div>
	
	<table class="table table-striped">
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
				<td>{{{ $transaction->title }}}</td>
				
				<td>{{{ $transaction->amount }}}</td>
				
				<td>{{{ $transaction->type }}}</td>
				
				<td>{{{ $transaction->frequency }}}</td>
				
				<td><button class="edit-button" data-transactionId='{{ $transaction->id }}'>Edit</button></td>
				
				<td><button class='delete-button' data-transactionId='{{ $transaction->id }}'>Delete</button></td>
			</tr>
		@endforeach

	</table>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#transactions-create">
		New Transaction
	</button>
@stop

@section('bottom-script')
	<script type="text/javascript">
		$(document).ready(function () {
			var startDate = moment('{{{ $simulation->user->created_at }}}'),
				endDate,
				distance,
				chart,
				simulations = [{
					'title' : '{{{ $simulation->title }}}',
					'approx_daily_value' : {{{ $simulation->approx_daily_value }}}
				}],
				domain = '{{{ $_ENV['DOMAIN'] }}}',
				transactions = [],
				pieData = [],
				debits = [],
				income = 0,
				simulation_id = {{{ $simulation->id }}},
				leftovers = 100;
				@foreach($simulation->transaction as $transaction)
					transactions.push({
							'title' : '{{{ $transaction->title }}}',
							'amount' : '{{{ $transaction->amount }}}',
							'type' : '{{{ $transaction->type }}}',
							'frequency' : '{{{ $transaction->frequency }}}'
					});
				@endforeach

			// New transaction button
			$('#new-transaction-submit').click(function () {
				var dataString = 'title=' + $('#transaction-title').val() + '&amount=' + $('#transaction-amount').val() + '&type=' + $('#transaction-type').val() + '&frequency=' + $('#transaction-frequency').val() + '&simulation_id=' + simulation_id;
				$.post(domain + 'transactions', dataString, function (data) {
					if (data.success) {
						console.log(data.message);						
					}
				});
			});

			// Calculates total monthly income and creates array of debits so that debits can be represented as a share of income in the pie chart
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

			// Delete button
			$('.delete-button').click(function () {
				var id;
				if(confirm('Delete This Transaction?')) {
					id = $(this).attr('data-transactionId');
					$.ajax({
						url : domain + 'transactions/' + id,
						type : 'post',
						data : {
							_method : 'delete'
						},
						success : function (data) {
							console.log(data.message);
						}
					});
					$('tr[data-transactionId=' + id + ']').remove();
				}
			});

			// Edit button
			$('.edit-button').click(function () {
				var id = $(this).attr('data-transactionId');
				$('#transactions-edit').modal();
			});

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
			
			// Date picker event handler updating line chart
			$('#toDatePicker').on('dp.change', function (e) {
				const CHART_INTERVALS = 10;
				var chartCategories = [],
					chartSeries = [],
					dayCount = [],
					endDate,
					distance;				
				endDate = moment($(this).data("DateTimePicker").getDate());
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
			});
		});	
	</script>
@stop

@section('modals')
	<!-- Modal -->
	<div class="modal fade" id="transactions-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">New Transaction</h4>
	      </div>
	      <div class="modal-body">
				<input type="text" name="transaction-title" id="transaction-title" placeholder="Name of New Transaction">			   	
			    
				<select name="transaction-frequency" id="transacton-frequency">
					<option value="">Frequency</option>
					<option value="daily">Daily</option>
					<option value="weekly">Weekly</option>
					<option value="monthly">Monthly</option>
				</select>
			    
				<input type="number" name="transaction-amount" id="transaction-amount" step="any" min="0" placeholder="Enter Amount">

				<select id="transaction-type">
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
				<input type="text" name="transaction-title" id="transaction-title" placeholder="Name of New Transaction">			   	
			    
				<select name="transaction-frequency" id="transacton-frequency">
					<option value="">Frequency</option>
					<option value="daily">Daily</option>
					<option value="weekly">Weekly</option>
					<option value="monthly">Monthly</option>
				</select>
			    
				<input type="number" name="transaction-amount" id="transaction-amount" step="any" min="0" placeholder="Enter Amount">

				<select id="transaction-type">
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