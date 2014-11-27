@extends('index')

@section('content')
	<div class="pull-left well">
		<h1>
			Liste des annonces
			@if(Auth::check())
			<a class="btn btn-small btn-success" href="{{ URL::to('annonce/create') }}">
				<span class="glyphicon glyphicon-plus"></span>
			</a>
			@endif
		</h1>
	</div>

	{{ Form::open(['class' => 'pull-right well', 'method'=>'get']) }}
		<div class="controls controls-row">
			<select class="span6" name="sort">
				<option value="date">Date de création</option>
				<option value="title">Titre</option>
				<option value="description">Description</option>
				<option value="tags">Tags</option>
				<option value="ville">Ville</option>
				<option value="prix">Prix</option>
			</select>
			<select class="span6" name="order">
				<option value="asc">asc</option>
				<option value="desc">desc</option>
			</select>
			@if(Input::has('search_param'))
				<input type="hidden" name="search_param" value="{{ Input::get('search_param')}}">
			@endif
			@if(Input::has('x'))
				<input type="hidden" name="x" value="{{ Input::get('x')}}">
			@endif
			<button type="submit" class="btn btn-sm btn-warning">Sort</button>
		</div>
	{{ Form::close() }}
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