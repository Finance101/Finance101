@extends('layouts.master')

@section('content')
	



    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-2">
		{{ Form::open(array('action' => 'UsersController@store', 'role'=>'form')) }}
			<h2>Sign Up <small>It's free!!</small></h2>
			<hr>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						
						{{ Form::text('first_name', null, array('name'=>'first_name', 'id'=>'first_name', 'class'=>'form-control input-lg', 'placeholder' => 'First Name', 'tabindex'=>'1')) }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						{{ Form::text('last_name', null, array('name'=>'last_name', 'id'=>'last_name', 'class'=>'form-control input-lg', 'placeholder' => 'Last Name', 'tabindex'=>'2')) }}
					</div>
				</div>
			</div>
			<div class="form-group">
				{{ Form::text('email', null, array('name'=>'email', 'id'=>'email', 'class'=>'form-control input-lg', 'placeholder' => 'E-mail Address', 'tabindex'=>'3')) }}
			</div>
					<div class="form-group">
						{{ Form::text('password', null, array('name'=>'password', 'id'=>'password', 'class'=>'form-control input-lg', 'placeholder' => 'Password', 'tabindex'=>'4')) }}
					</div>
			<hr>
			
				
					<input type="submit" value="Register" class="btn btn-lg btn-block pull-right" tabindex="7" style="background-color: 68dff0"></div>
		
		{{ Form::close() }}
		@stop
	
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>