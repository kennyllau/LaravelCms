@extends('layouts.admin')


@section('content')

	@if(Session::has('deleted_post'))

		<p class="bg-danger"> {{session('deleted_post')}} </p>

	@endif

	<h2>Posts</h2>

	<table class="table table-hover table-stripe">
		<thead>
			<tr>
				<th>Id</th>
				<th>Photo</th>
				<th>User</th>
				<th>Title</th>
				<th>Body</th>
				<th>Category</th>
				<th>Post Link</th>
				<th>Comments Link</th>
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

							<td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>

							<td>{{$post->title}}</td>

							<td>{{str_limit($post->body, 15)}}</td>

							<td>{{$post->category_id ? $post->category->name : 'Uncategorized'}}</td>

							<td><a href="{{route('home.post', $post->slug)}}">View Blog</a></td>

							<td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>

							<td>{{$post->created_at}}</td>
							<td>{{$post->updated_at}}</td>
						</tr>
					</tbody>
			@endforeach

		@endif

	</table>

	<div class="row">
		<div class="col-sm-6 col-sm-offset-5">
			<!-- render is a global function -->
			{{$posts->render()}}
		</div>
	</div>

@endsection