@extends('index')

@section('content')
	{{ Form::model($annonce, ['route' => ['annonce.update', $annonce->id], 'method' => 'PUT']) }}
		<h2>Edition de l'annonce</h2>

		@if (isset($errors) && count($errors->all()) >0)
			<div class="alert alert-warning">
				{{ HTML::ul($errors->all()) }}
			</div>
		@endif

		<div class="form-group">
			{{ Form::label('title', 'Titre de l\'annonce') }}
			{{ Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Titre']) }}
		</div>
		<div class="form-group">
			{{ Form::label('description', 'Description de l\'annonce') }}
			{{ Form::textarea('description', null, ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('prix', 'Prix') }}
			{{ Form::text('prix', null,['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('ville', 'Ville') }}
			{{ Form::text('ville', null, ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('tags', 'Catégories') }}
			{{ Form::text('tags', null, ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			<div class="row marketing">
				@foreach ($annonce->uploads as $upload)
					<div class="col-lg-3">
						<a href="{{ URL::to($upload->getUri($annonce->id)) }}" class="fancybox fancybox.image">
							<img src="{{ URL::to($upload->getUri($annonce->id)) }}" alt="img" class="img-responsive img-rounded center-block ">
						</a>
					</div>
				@endforeach
			</div>
		</div>
		<div class="form-group">
			{{ Form::submit('Valider', ['class'=>'btn btn-large btn-primary btn-block'])}}
		</div>
	{{ Form::close() }}
@stop