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
			var startDate = moment('{{{ $simulations[0]->user->created_at }}}'),
				endDate,
				distance,
				chart,
				simulations = [];
				
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
		    		const CHART_INTERVALS = 10;
		        	var chartCategories = [],
		        		chartSeries = [],
		        		dayCount = [],
		        		endDate,
		        		distance;
			        
			        endDate = moment($(this).datepicker('getDate'));
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
			});
	</script>
@stop