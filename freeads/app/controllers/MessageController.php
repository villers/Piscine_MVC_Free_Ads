<?php

class MessageController extends \BaseController {

	/**
	 * Display a listing of messages
	 *
	 * @return Response
	 */
	public function index()
	{
		$message_send = Message::where('sender_id', '=', Auth::user()->id)->paginate(10);
		$message_recev = Message::where('dest_id', '=', Auth::user()->id)->paginate(10);
		Message::where('dest_id', '=', Auth::user()->id)->update(array('status' => 1));
		return View::make('messages.index', compact('message_send','message_recev'));
	}

	/**
	 * Show the form for creating a new message
	 *
	 * @return Response
	 */
	public function create()
	{
		$usernames = User::orderBy('username', 'asc')->lists('username', 'id');
		return View::make('messages.create', compact('usernames'));
	}

	/**
	 * Store a newly created message in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Message::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['sender_id'] = Auth::user()->id;
		$data['status'] = 0;
		Message::create($data);

		return Redirect::route('message.index');
	}

	public function edit($id)
	{
		$user = User::findOrFail($id);
		return View::make('messages.edit', compact('user'));
	}

	public function show($id)
	{
		$message = Message::findOrFail($id);

		if(!$message->authorized())
			return Redirect::to('/annonce/all')->with('message', 'Cette message ne vous appartient pas.');

		return View::make('messages.show', compact('message'));
	}

	/**
	 * Remove the specified message from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$message = Message::findOrFail($id);

		if(!$message->authorized())
				return Redirect::to('/annonce/all')->with('message', 'Cette message ne vous appartient pas.');

		$message->delete();

		return Redirect::route('message.index');
	}

}
