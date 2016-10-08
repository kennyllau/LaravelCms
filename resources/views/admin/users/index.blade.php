@extends('layouts.admin')


@section('content')

	@if(Session::has('deleted_user'))

		<p class="bg-danger"> {{session('deleted_user')}} </p>

	@endif
	<h1 class="text-center">Users</h1>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Status</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>
		<tbody>
		@if($users)
			@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>

					<!-- if the user photo exist, print it out, if not say 'no photo' -->			
					<!-- <td>{{ $user->photo ? $user->photo->file : 'no photo' }}</td> -->
					<!-- <td><img height="50" src="/images/{{$user->photo ? $user->photo->file : 'no photo' }}"></td> -->
					<td><img height="50" src="{{$user->photo ? $user->photo->file : '/images/defaultuser.jpg' }}"></td>

					<td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>

					<td>{{$user->email}}</td>

					<td>{{$user->role->name}}</td>
					<td>{{ $user->is_active}} </td>
					
					<!-- carbon is included with laravel -->
					<td>{{ $user->created_at->diffForHumans() }}</td>
					<td>{{ $user->updated_at->diffForHumans() }}</td>
				</tr>
			@endforeach
		@endif


		</tbody>
	</table>


@endsection