@extends('layouts.master')

@section('content')
	<div class="container-fluid">
	
	<h3>Visualizing Your Future</h3><br>
	<h4>Comparing your budgets. </h4>
	<p> See for yourself: Choose a projection date. </p>

	<!-- datepicker -->
	<div class="datetimepicker input-group date mb-lg">
    	<input type="text" class="form-control" id="toDatePicker" placeholder='Projection Date'>
        <span class="input-group-addon">
        	<span class="fa fa-calendar"></span>
        </span>
    </div>
</div>
	
	<div id="chartDisplay"></div>

	<p>Click your budget above to add or remove from the comparison chart. </p>


   <div class="panel panel-default">
                     <div class="panel-heading"> My Budgets | 
                        <small>All</small>
                     </div>
                     <div class="panel-body">
                        <table id="datatable1" class="table table-striped table-hover">
                             <thead>
                             <tr>
                                <th><i class="fa fa-bullhorn"></i> Budget Name</th>
                                <th><i class="fa fa-calendar"></i> Created At</th>
                                <th><i class="fa fa-money"></i> Daily Revenue</th>
                                <th> </th>
                             </tr>
                             </thead>
                             <tbody>
                             <tr>
                                @foreach ($simulations as $simulation)
                                <td><a href="{{ action('SimulationsController@show', $simulation->id) }}">{{{ $simulation->title }}}</a></td>
                                <td style="padding:15px">{{{ date("m /d /y",strtotime($simulation->created_at)) }}}</td>
                                <td style="padding:15px">{{{ $simulation->approx_daily_value }}}</td>
                                <td style="padding:15px">
                                      <button class="btn btn-danger btn-xs" type="submit" action="SimulationsController@destroy"><i class="fa fa-trash-o "></i></button>
                                  </td>
                             </tr>
                              @endforeach
                              </tbody>
                          </table>
                         
                          </div>
                  </div>
	
</div>
@stop

@section('bottom-script')
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
			$( "#toDatePicker" ).datetimepicker();
		    
		    $('#toDatePicker').on('dp.change', function (e) {
		    	const CHART_INTERVALS = 10;
	        	var chartCategories = [],
	        		chartSeries = [],
	        		dayCount = [],
	        		endDate,
	        		distance;
		        
		        endDate = moment($(this).data("DateTimePicker").getDate());
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
		    });

	</script>
@stop