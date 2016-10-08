@extends('layouts.admin')

@section('styles')
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@stop



@section('content')

	<h2>Upload Media</h2>

	{!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class'=>'dropzone'])!!}



	{!! Form::close() !!}

@endsection




@section('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
	
@stop