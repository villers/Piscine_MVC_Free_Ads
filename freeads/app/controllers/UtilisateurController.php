<?php

class UtilisateurController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Auth::check() || Auth::user()->id != 1)
			return Redirect::to('/annonce/all')->with('message', 'Vous ne pouvez pas acceder a cette page.');

		$users = User::paginate(10);
		return View::make('utilisateurs.index', compact('users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('utilisateurs.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), User::$rules);
		if ($validator->fails()) {
			return Redirect::to('utilisateur/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			$user = new User;
			$user->username  			= Input::get('username');
			$user->password  			= Hash::make(Input::get('password'));
			$user->email 				= Input::get('email');
			$user->confirmation_code    = str_random(30);
			$user->save();


	        Mail::send('emails.verify', $user->toArray() , function($message) {
				$message->from('villers.mickael@gmail.com', 'Cloud');
				$message->to(Input::get('email'), Input::get('username'))
					->subject('Vérifier votre adresse email');
			});

			return Redirect::to('/')
				->with('message', 'Le compte a bien été crée. Pensez a valider votre compte');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		$sort = in_array(Input::get('sort'), ['title', 'description', 'tags', 'prix', 'ville']) ? Input::get('sort') : 'id';
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';
		$annonces = Annonce::orderBy($sort, $order)->where('user_id', '=', $id)->paginate(5);

		return View::make('utilisateurs.show', compact('user', 'annonces'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		if(!Auth::check() || !$user->authorized())
			return Redirect::to('/annonce/all')->with('message', 'Vous ne pouvez pas acceder a cette page.');

		return View::make('utilisateurs.edit', compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), User::$rules_update);
		if ($validator->fails()) {
			return Redirect::to('utilisateur/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			$user = User::findOrFail($id);

			if(!Auth::check() || !$user->authorized())
				return Redirect::to('/annonce/all')->with('message', 'Vous ne pouvez pas acceder a cette page.');

			$user->username   = Input::get('username');
			$user->email      = Input::get('email');
			if(Input::get('password') != '')
				$user->password   = Hash::make(Input::get('password'));
			$user->save();

			return Redirect::to('/')
				->with('message', 'Le compte a bien été édité');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);

		if(!Auth::check() || !$user->authorized())
			return Redirect::to('/annonce/all')->with('message', 'Vous ne pouvez pas acceder a cette page.');

		$user->delete();

		return Redirect::to('/')
			->with('message', 'L\'utilisateur a bien été supprimé!');
	}

	public function getLogin()
	{
		return View::make('utilisateurs.login');
	}

	public function postLogin()
	{
		$input = [
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'confirmed' => 1
		];
		if (Auth::attempt($input))
			return Redirect::intended()->with('message', 'Vous etes maintenant connecté!');
		else
			return Redirect::back()->with('message', 'Les identifiants sont est invalide ou le compte est non validé');
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('login')
			->with('message', 'Vous etes maintenant déconnecté!');
	}

	public function getConfirm($confirmation_code)
	{
		if(!$confirmation_code)
            throw new InvalidConfirmationCodeException;

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if (!$user)
            throw new InvalidConfirmationCodeException;

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        return Redirect::to('login')
        	->with('message', 'Vous avez valider votre compte.');
	}
}
