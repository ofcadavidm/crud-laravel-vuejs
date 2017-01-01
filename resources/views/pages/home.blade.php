@extends('layout')





@section('content')
	
	<div id="app">
		<tasks></tasks>
	</div>

@stop


<script>window.Laravel = { csrfToken: '{{ csrf_token() }}' };</script>