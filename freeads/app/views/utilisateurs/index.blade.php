@extends('index')

@section('content')
	<h1>Liste des utilisateurs</h1>
	<h2><a class="btn btn-small btn-success" href="{{ URL::to('utilisateur/create') }}">Créer un utilisateur</a></h2>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Username</td>
				<td>Email</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ e($user->username) }}</td>
				<td>{{ e($user->email) }}</td>
				<td>
					{{ Form::open(['url' => 'utilisateur/' . $user->id, 'class' => 'pull-right']) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Supprimer', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}

					<a class="btn btn-small btn-info pull-right" href="{{ URL::to('utilisateur/' . $user->id . '/edit') }}">Editer</a>
					<a class="btn btn-small btn-success pull-right" href="{{ URL::to('utilisateur/' . $user->id) }}">Afficher</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

	{{ $users->links() }}
@stop