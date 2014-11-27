<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Site d'annonce réalisé pour la webacademie">
		<meta name="author" content="viller_m">

		<title>@yield('title') | Freeads</title>

		<!-- Bootstrap core CSS -->
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('packages/fancybox/source/jquery.fancybox.css') }}
		{{ HTML::style('css/style.css') }}
	</head>

	<body>

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ URL::to('/') }}">My Ads</a>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					@if(Auth::check())
					<ul class="nav navbar-nav">
						<li>{{ HTML::link('annonce', 'Mes Annonces') }}</li>
					</ul>
					@endif

					<div class="col-sm-4 col-md-4">
				        <form class="navbar-form" role="search" action="{{ URL::to('annonce/search') }}" method="GET" id="search-form">
					        <div class="input-group">
				                <div class="input-group-btn search-panel">
				                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				                    	<span id="search_concept">Filter par</span> <span class="caret"></span>
				                    </button>
				                    <ul class="dropdown-menu" role="menu">
										<li><a href="#title">Titre</a></li>
										<li><a href="#description">Description</a></li>
										<li><a href="#tags">Tags</a></li>
										<li><a href="#ville">Ville</a></li>
										<li><a href="#prix">Prix</a></li>
										<li class="divider"></li>
										<li><a href="#all">Tous</a></li>
				                    </ul>
				                </div>
				                <input type="hidden" name="search_param" value="all" id="search_param">
				                <input type="text" class="form-control" name="x" placeholder="Recherche ...">
				                <span class="input-group-btn">
				                    <input class="btn btn-default" type="submit">
				                </span>
				            </div>
				        </form>
				    </div>
					<ul class="nav navbar-nav navbar-right">
						@if(!Auth::check())
							<li>{{ HTML::link('login', 'Connexion') }}</li>
							<li>{{ HTML::link('utilisateur/create', 'Inscription') }}</li>
						@else
							<li><a href="{{ URL::to('message') }}">Inbox <span class="badge">{{ $count_message}}</span></a></li>
							<li>{{ HTML::link('utilisateur/'.Auth::User()->id, Auth::User()->username) }}</li>
							<li>{{ HTML::link('logout', 'Déconnexion') }}</li>
						@endif
					</ul>
				</div>

			</div>
		</div>

		<div class="container">
			@if(Session::has('message'))
				<div class="alert alert-info">
					{{ Session::get('message') }}
				</div>
			@endif

			@yield('content')
		</div>

		<script>baseUrl = "{{ URL::to('/') }}";</script>
		{{ HTML::script('js/jquery-2.1.1.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		{{ HTML::script('packages/fancybox/source/jquery.fancybox.js') }}

		{{ HTML::script('js/main.js') }}
	</body>
</html>
