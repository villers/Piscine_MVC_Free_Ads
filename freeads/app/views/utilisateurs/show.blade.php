@extends('index')

@section('content')
	<h1>
		Profil de  {{ e($user->username) }}
		@if(Auth::check() && $user->authorized())
		<a href="{{ URL::to('utilisateur/'.$user->id.'/edit') }}">
			<span class="glyphicon glyphicon-edit"></span>
		</a>
		@endif
	</h1>

	<div class="jumbotron text-center">
		<h2>{{ e($user->username) }}</h2>
		<p>
			<strong>Email:</strong> {{ e($user->email) }}
		</p>
	</div>

	<?php $y=1; ?>
	@foreach($annonces as $annonce)
		<div class="row carousel-row">
			<div class="col-xs-12 slide-row">
				<span class="label label-primary pull-right">{{ HTML::link('utilisateur/'.$annonce->user_id, e($annonce->user->username)) }} on <em>{{ e($annonce->created_at->format('F jS, H:i')) }}</em> | <i>{{ e($annonce->tags) }}</i> | <i>{{ e($annonce->ville) }}</i></span>
				<div id="carousel-{{$y}}" class="carousel slide slide-carousel" data-ride="carousel">
					<ol class="carousel-indicators">
						@for ($i=0; $i < count($annonce->uploads); $i++)
							<li data-target="#carousel-{{$y}}" data-slide-to="{{$i}}" <?php if($i==0) echo 'class="active"';?>></li>
						@endfor
					</ol>

					<div class="carousel-inner">
						<span class="label label-danger pull-left prix">Prix: {{ e($annonce->prix) }}€</span>
						@for ($i=0; $i < count($annonce->uploads); $i++)
							<div class="item <?php if($i==0) echo 'active';?>">
								<img src="{{URL::to($annonce->uploads[$i]->getUri($annonce->id))}}" alt="Image" class="img-height-fixed">
							</div>
						@endfor
					</div>
				</div>
				<a href="{{ URL::to('annonce/' . $annonce->id) }}">
					<div class="slide-content">
						<h4>{{ e($annonce->title) }}</h4>
						<p>{{ e($annonce->description) }}</p>
					</div>
				</a>
				<div class="slide-footer">
					@if(Auth::check() && $annonce->authorized())
						{{ Form::open(['url' => 'annonce/' . $annonce->id, 'class' => 'pull-right']) }}
							{{ Form::hidden('_method', 'DELETE') }}
							<button class="btn btn-small btn-danger" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
						{{ Form::close() }}

						<a class="btn btn-small btn-primary pull-right" href="{{ URL::to('annonce/' . $annonce->id . '/edit') }}"><span class="glyphicon glyphicon-edit"></span></a>
					@endif
					<a class="btn btn-small btn-default pull-right" href="{{ URL::to('annonce/' . $annonce->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
				</div>

			</div>
		</div>
		<?php $y++; ?>
    @endforeach

    {{ $annonces->appends(Input::all())->links() }}
@stop