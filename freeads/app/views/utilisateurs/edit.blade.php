@extends('index')

@section('content')
	{{ Form::model($user, ['route' => ['utilisateur.update', $user->id], 'method' => 'PUT', 'class'=>'form-signup']) }}
		<h2>Edition</h2>

		@if (isset($errors) && count($errors->all()) >0)
			<div class="alert alert-warning">
				{{ HTML::ul($errors->all()) }}
			</div>
		@endif

		<div class="form-group">
			{{ Form::label('username', 'Nom d\'utilisateur') }}
			{{ Form::text('username', Input::old('username'), ['class'=>'form-control', 'placeholder'=>'Username']) }}
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email Address']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password_confirmation', 'Confirmation du password') }}
			{{ Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirm Password']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('Register', ['class'=>'btn btn-large btn-primary btn-block'])}}
		</div>
	{{ Form::close() }}
@stop