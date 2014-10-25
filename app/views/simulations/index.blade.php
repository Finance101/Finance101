@extends('layouts.master')

@section('content')
	<script type="text/javascript" src="/js/highcharts.js"></script>
		
	<table>
		<th>Simulation</th>
		
		<th>View On Chart</th>
		
		@foreach($simulations as $simulation)
			<tr>	
				<td><a href="{{ action('SimulationsController@show', $simulation->id) }}">{{{ $simulation->title }}}</a></td>
				
				<td><input type="checkbox" id="{{{ $simulation->id }}}" class="chartToggle"></td>
			</tr>
		@endforeach
	</table>

	<div id="chartDisplay"></div>

	<script type="text/javascript">
		$('document').ready(function () {
			
			var chartCategories = [];

			var chartSeries = [];
			
			for(var i = 1; i < 366; i += 18.25) {
				chartCategories.push(i);
			}

			@foreach($simulations as $simulation)
				var {{{ 'sim' . $simulation->id . 'Daily' }}} = [];
				
				chartCategories.forEach(function (element, index, array) {
					<?='sim' . $simulation->id . 'Daily'?>.push({{{ $simulation->approx_daily_value }}} * element);
				});
				
				chartSeries.push({
					name: '{{{ $simulation->title }}}',
					data: <?='sim' . $simulation->id . 'Daily'?>
				});
			@endforeach

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

			$('.chartToggle').click(function () {
		
			});
		});
	</script>
@stop