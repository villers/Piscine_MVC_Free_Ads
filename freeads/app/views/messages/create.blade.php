@extends('index')

@section('content')
	{{ Form::open(['route' => ['message.store'], 'method' => 'POST']) }}
		<h2>Envoyer un message</h2>

		@if (isset($errors) && count($errors->all()) >0)
			<div class="alert alert-warning">
				{{ HTML::ul($errors->all()) }}
			</div>
		@endif

		<div class="form-group">
			{{ Form::label('dest_id', 'Destinataire') }}
			{{ Form::select('dest_id', $usernames , Input::old('dest_id'), ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('body', 'Message') }}
			{{ Form::textarea('body', null, ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('Envoyer', ['class'=>'btn btn-large btn-primary btn-block'])}}
		</div>
	{{ Form::close() }}
@stop