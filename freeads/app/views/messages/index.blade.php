@extends('index')

@section('content')
	<h1>Liste des messages reçu</h1>
	<h2><a class="btn btn-small btn-success" href="{{ URL::to('message/create') }}">Envoyer un message</a></h2>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>De</td>
				<td>Message</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
		@foreach($message_recev as $message)
			<tr>
				<td class="col-xs-1">{{ $message->id }}</td>
				<td class="col-xs-2">{{ e($message->sender->username) }}</td>
				<td class="col-xs-6"><span class="badge">{{$message->status ? 'lu' : 'nouveau'}}</span> <a href="{{ URL::to('message/'.$message->id) }}" class="fancybox fancybox.iframe">{{ str_limit(e($message->body), 150) }}</a></td>
				<td class="col-xs-3">
					{{ Form::open(['url' => 'message/' . $message->id, 'class' => 'pull-right']) }}
						{{ Form::hidden('_method', 'DELETE') }}
						<button class="btn btn-small btn-danger" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
					{{ Form::close() }}

					<a class="btn btn-small btn-primary pull-right" href="{{ URL::to('message/' . $message->sender_id . '/edit') }}"><span class="glyphicon glyphicon-arrow-right"></span></a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<ul class="pagination">
        {{ $message_recev->links() }}
    </ul>

    <h1>Liste des messages envoyé</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>À</td>
				<td>Message</td>
			</tr>
		</thead>
		<tbody>
		@foreach($message_send as $message)
			<tr>
				<td class="col-xs-1">{{ $message->id }}</td>
				<td class="col-xs-2">{{ e($message->sender->username) }}</td>
				<td class="col-xs-9"><span class="badge">{{$message->status ? 'lu' : 'non lu'}}</span> <a href="{{ URL::to('message/'.$message->id) }}" class="fancybox fancybox.iframe">{{ str_limit(e($message->body), 150) }}</a></td>
			</tr>
		@endforeach
		</tbody>
	</table>

    {{ $message_send->links() }}
@stop