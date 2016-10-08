@extends('layouts.admin')


@section('content')

	<h2>Posts</h2>

	<table class="table table-hover table-stripe table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Photo</th>
				<th>User</th>
				<th>Title</th>
				<th>Body</th>
				<th>Category</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>

		@if($posts)

			@foreach($posts as $post)
					<tbody>
						<tr>
							<td>{{$post->id}}</td>

							<td><img height="50" src="{{ $post->photo ? $post->photo->file : '/images/defaultuser.jpg' }}" alt=""></td>

							<td>{{$post->user->name}}</td>
							<td>{{$post->title}}</td>
							<td>{{$post->body}}</td>

							<td>{{$post->category_id ? $post->category->name : 'Uncategorized'}}</td>

							<td>{{$post->created_at}}</td>
							<td>{{$post->updated_at}}</td>
						</tr>
					</tbody>
			@endforeach

		@endif

	</table>

@endsection