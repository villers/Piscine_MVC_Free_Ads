@extends('index')

@section('content')
	<div class="container">
		<h2>{{ e($annonce->title) }}</h2>
		<div class="well well-sm">
			@if(Auth::check())
				<a class="label label-primary pull-right" href="{{ URL::to('message/' . $annonce->user_id . '/edit') }}">Contacter</a>
			@endif
			<span class="label label-danger pull-right">Prix: {{ e($annonce->prix) }}€</span>
			<p>
				<span class="label label-info">{{ HTML::link('utilisateur/'.$annonce->user_id, e($annonce->user->username)) }} on <em>{{ e($annonce->created_at->format('F jS, H:i')) }}</em> | <i>{{ e($annonce->tags) }}</i> | <i>{{ e($annonce->ville) }}</i></span>
				<br>
				{{ e($annonce->description) }}
			</p>
		</div>
		<div class="row marketing">
			@foreach ($annonce->uploads as $upload)
				<div class="col-lg-3 col-md-3 col-sm-3">
					<a href="{{ URL::to($upload->getUri($annonce->id)) }}" class="fancybox fancybox.image">
						<img src="{{ URL::to($upload->getUri($annonce->id)) }}" alt="img" class="img-responsive img-rounded center-block ">
					</a>
				</div>
			@endforeach
		</div>
	</div>
@stop