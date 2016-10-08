@extends('layouts.admin')



@section('content')

	<h2>Edit Users</h2>

	<div class="row">

		<div class="col-sm-3">
			
			<img class="img-responsive" src="{{$user->photo ? $user->photo->file : '/images/defaultuser.jpg' }}" alt="" style="border-radius: 15px;">

		</div>

		<div class="col-sm-9">
			<!-- files=>true to make form enctype="multipart/form-data" -->
			{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true ]) !!}

				<div class="form-group">
					{!! Form::label('name', 'Name:') !!}
					{!! Form::text('name', null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('email', 'Email:') !!}
					{!! Form::email('email', null, ['class'=>'form-control']) !!}
				</div>

				<!-- concatenate [''=>'Choose Options'] + roles -->
				<div class="form-group">
					{!! Form::label('role_id', 'Role:') !!}
					{!! Form::select('role_id',[''=>'Choose Options'] + $roles, null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('is_active', 'Status:') !!}
					{!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('photo_id', 'Photo:') !!}
					{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Password:') !!}
					{!! Form::password('password', ['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}
				</div>

			{!! Form::close() !!}

			{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

				<div class="form-group">
					{!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6']) !!}
				</div>

			{!! Form::close() !!}

		</div>
	</div> <!-- end row -->

	<div class="row">
		
		@include('includes.form_error')
		
	</div>

@endsection