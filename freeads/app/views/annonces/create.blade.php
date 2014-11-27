@extends('index')

@section('content')
	{{ Form::open(['route' => ['annonce.store'], 'method' => 'POST', 'files'=>true]) }}
		<h2>Ajout d'une annonce</h2>

		@if (isset($errors) && count($errors->all()) >0)
			<div class="alert alert-warning">
				{{ HTML::ul($errors->all()) }}
			</div>
		@endif

		<div class="form-group">
			{{ Form::label('title', 'Titre de l\'annonce') }}
			{{ Form::text('title', Input::old('title'), ['class'=>'form-control', 'placeholder'=>'Titre']) }}
		</div>
		<div class="form-group">
			{{ Form::label('description', 'Description de l\'annonce') }}
			{{ Form::textarea('description', null, ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('prix', 'Prix en euros') }}
			{{ Form::text('prix', null, ['class'=>'form-control', 'placeholder'=>'10']) }}
		</div>
		<div class="form-group">
			{{ Form::label('ville', 'Ville') }}
			{{ Form::text('ville', null, ['class'=>'form-control', 'placeholder'=>'lyon']) }}
		</div>
		<div class="form-group">
			{{ Form::label('tags', 'Catégories') }}
			{{ Form::text('tags', null, ['class'=>'form-control', 'placeholder'=>'voiture']) }}
		</div>
		<div class="form-group">
			{{ Form::label('files[]', 'Images') }}
			{{ Form::file('files[]', ['class'=>'form-control', 'multiple']) }}
        </div>
		<div class="form-group">
			{{ Form::submit('Valider', ['class'=>'btn btn-large btn-primary btn-block'])}}
		</div>
	{{ Form::close() }}
@stop