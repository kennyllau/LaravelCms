@extends('layouts.admin')

@section('content')

	<h2>Categories</h2>

	<div class="col-sm-6">
		
		{!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->]]) !!}

			<div class="form-group">
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Create Category', ['class'=>'btn btn-primary col-sm-6']) !!}
			</div>

		{!! Form::close() !!}

<!-- 		{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

			<div class="form-group">
				{!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6']) !!}
			</div>

		{!! Form::close() !!} -->

	</div>




@endsection