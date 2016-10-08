@extends('layouts.admin')

@section('content')

	<h2>Categories</h2>

	<div class="col-sm-6">
		
		{!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

			<div class="form-group">
				{!! Form::label('name', 'Name:') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="col-sm-6">
		
		@if($categories)
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Created</th>
					</tr>
				</thead>

				@foreach($categories as $category)

					<tbody>
						<tr>
							<td>{{$category->id}}</td>
							<td>{{$category->name}}</td>

							<td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
						</tr>
					</tbody>

				@endforeach
			</table>
		@endif

	</div>


@endsection