@extends('app')

@section('content')

	<h1>Edit:{{ $articles->title }}</h1>

	<hr>
	
	{!! Form::model($articles,['method'=>'PATCH' , 'action'=>['ArticlesController@update' , $articles->id]]) !!}

		@include('articles.form' , ['submitButton'=>'Update Article'])

	{!! Form::close() !!}

	@include('errors.list')

@stop