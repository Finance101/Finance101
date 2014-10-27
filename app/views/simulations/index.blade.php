@extends('layouts.master')

@section('content')
	<script type="text/javascript" src="/js/highcharts.js"></script>
	<script type="text/javascript" src="/js/moment.min.js"></script>
		
	<table>
		<th>Simulation</th>

		@foreach($simulations as $simulation)
			<tr>	
				<td><a href="{{ action('SimulationsController@show', $simulation->id) }}">{{{ $simulation->title }}}</a></td>
			</tr>
		@endforeach
	</table>

	<div id="toDatePicker"></div>

	<div id="chartDisplay"></div>

	<script type="text/javascript">
		$('document').ready(function () {
			var startDate = moment('{{{ $simulations[0]->user->created_at }}}');
			console.log(startDate);

			var endDate;

			var distance;

			var chart;
						
			var simulations = [];
				
			@foreach($simulations as $simulation)
				simulations.push({
					'title' : '{{{ $simulation->title }}}',
					'approx_daily_value' : {{{ $simulation->approx_daily_value }}}
				});
			@endforeach
								
			// user sets projection distance with jQuery UI's datepicker	
			$( "#toDatePicker" ).datepicker({ 
		    	dateFormat: "yyyy-mm-dd",
		    	onSelect: function() { 
		        	var chartCategories = [];
		        	var chartSeries = [];
		        	var dayCount = []
			        endDate = moment($(this).datepicker('getDate'));
					// moment.js finds number of days from user's account creation date to projection date
			        distance = endDate.diff(startDate, 'days');
					// javascript creates twenty points to plot on chart.js line graph
			        for(var i = 1; i <= distance; i += (distance / 20)) {
						dayCount.push(Math.floor(i));
					}
					
					dayCount.forEach(function (day, index, array) {
						console.log(day);
						newDate = startDate.add(day, 'days');
						console.log(newDate);
						chartCategories.push(newDate);
					});
									
					simulations.forEach(function (simulation, index, array) {
						var dataPoints = [];
						dayCount.forEach(function (category, index, array) {
							dataPoints.push(simulation.approx_daily_value * category);
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
			});
		});
	</script>
@stop