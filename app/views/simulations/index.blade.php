@extends('layouts.master')

@section('content')
<h3>Visualizing Your Future</h3>
<p>After you’ve had a chance to monitor your income and expenses for a month or two, you will be more aware of areas that need adjusting.</p><p>
Maybe your initial monthly income estimates were off, or perhaps you didn’t account for expenses like car repairs or veterinarian bills. Now you can make the necessary and informed adjustments to have a budget that is more comprehensive and well-rounded.</p>
<p>Once you work out all the kinks in your budget, you should be able to stick to it for a length of time. However, it’s not meant to be set in stone. You must manage your budget regularly by accounting for changes in your income and spending needs. It’s recommended you do this every three months.</p>
<p>Below choose a calendar date to project your future.</p>	

<div class="col-md-10">	
	<!-- datepicker -->
	<div class="col-md-4 datetimepicker input-group date mb-lg">
   	<input type="text" class="form-control" id="toDatePicker" placeholder='Projection Date'></input>
       <span class="input-group-addon">
       <span class="fa fa-calendar"></span>
       </span>
   	</div>

	<div id="chartDisplay"></div>
</div>

<div class="col-md-10">	
<div id="panel-2" class="panel panel-warning">
<div class="panel-heading"> My Budgets</div>
<div class="panel-body">
	<table class="table table-striped table-hover">
		<thead>
		<tr>
		<th><i class="fa fa-bullhorn"></i> Budget Name</th>
		<th><i class="fa fa-calendar"></i> Created At</th>
		<th><i class="fa fa-money"></i> Daily Change</th>
		<th> Delete </th>
		</tr>
	</thead>
	<tbody>
		@foreach($simulations as $simulation)
			<tr>	
			<td><a href="{{ action('SimulationsController@show', $simulation->id) }}">{{{ $simulation->title }}}</a></td>
			<td>{{ $simulation->created_at}}}</td>
			<td>{{{ $simulation->approx_daily_value}}}</td>
			<td><button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o"></i></button></td>
			</tr>
		@endforeach
	</tbody>
	</table>
</div>
</div>
</div>
</div>
@stop

@section('bottom-script')
	<script type="text/javascript">
		$(document).ready(function () {
			var startDate = moment('{{{ $simulations[0]->user->created_at }}}'),
				endDate = moment(),
				distance,
				chart,
				simulations = [];
				
			@foreach($simulations as $simulation)
				simulations.push({
					'title' : '{{{ $simulation->title }}}',
					'approx_daily_value' : {{{ $simulation->approx_daily_value }}}
				});
			@endforeach

			function roundToTwo(num) {    
				return +(Math.round(num + "e+2")  + "e-2");
			}

			function displayLineChart () {
				const CHART_INTERVALS = 10;
		        	var chartCategories = [],
		        		chartSeries = [],
		        		dayCount = [],
		        		distance;			        
					// moment.js finds number of days from user's account creation date to projection date
			        distance = endDate.diff(startDate, 'days');
					// javascript creates twenty points to plot on chart.js line graph
			        for(var i = 1; i <= CHART_INTERVALS; i++) {
						dayCount.push(Math.round(distance * i / CHART_INTERVALS));
					}
					
					dayCount.forEach(function (day, index, array) {
						var newDate = moment(startDate);
						newDate.add(day, 'days');
						// chartCategories.push(newDate.fromNow());
						chartCategories.push(newDate.format('M-D-YY'));
					});
									
					simulations.forEach(function (simulation, index, array) {
						var dataPoints = [];
						dayCount.forEach(function (day, index, array) {
							dataPoints.push(roundToTwo(simulation.approx_daily_value * day));
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

			// user sets projection distance with jQuery UI's datepicker	
			$( "#toDatePicker" ).datetimepicker();
		    
		    $('#toDatePicker').on('dp.change', function () {
		        endDate = moment($(this).data("DateTimePicker").getDate());
		    	displayLineChart();
		    });
		    
		    displayLineChart();
		});    
	</script>
@stop