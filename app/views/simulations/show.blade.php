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
	  Launch demo modal
	</button>
@stop

@section('bottom-script')
	<script type="text/javascript">
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
				income = 0;
				@foreach($simulation->transaction as $transaction)
					transactions.push({
							'title' : '{{{ $transaction->title }}}',
							'amount' : '{{{ $transaction->amount }}}',
							'type' : '{{{ $transaction->type }}}',
							'frequency' : '{{{ $transaction->frequency }}}'
					});
				@endforeach

			console.log(transactions[0].title);

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
					// console.log('Adding transaction number ' + transaction.title + ' to debits');
				}
			});
			var leftovers = 100;
			// console.log(debits);
			debits.forEach(function (debit, index, array) {
				// console.log(income);
				// console.log(debit.amount * 100 / income);
				var share = Math.round(debit.amount * 100 / income)
				var newData = [debit.title, share];
				// console.log(newData);
				leftovers -= share;
				pieData.push(
					newData
				);
			});

			pieData.push(['Surplus', leftovers]);

			// console.log(pieData);

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
			    				    
			    {{ Form::submit() }}
			{{ Form::close() }}
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
@stop