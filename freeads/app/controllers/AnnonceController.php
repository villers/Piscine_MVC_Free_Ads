<?php

class AnnonceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Auth::check())
			return Redirect::to('/annonce/all')->with('message', 'Vous devez etre connecté pour acceder a cette page');

		$sort = in_array(Input::get('sort'), ['title', 'description', 'tags', 'prix', 'ville']) ? Input::get('sort') : 'id';
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';
		$annonces = Annonce::orderBy($sort, $order)->where('user_id', '=', Auth::user()->id)->paginate(5);
		return View::make('annonces.index', compact('annonces'));
	}

	public function indexAll()
	{
		$sort = in_array(Input::get('sort'), ['title', 'description', 'tags', 'prix', 'ville']) ? Input::get('sort') : 'id';
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';
		$annonces = Annonce::orderBy($sort, $order)->paginate(5);
		return View::make('annonces.index', compact('annonces'));
	}

	public function search()
	{
		$sort = in_array(Input::get('sort'), ['title', 'description', 'tags', 'prix', 'ville']) ? Input::get('sort') : 'id';
		$order = Input::get('order') === 'asc' ? 'asc' : 'desc';

		if(!Input::has('search_param') && !Input::has('x'))
			return Redirect::to('/');
		if(!in_array(Input::get('search_param'), ['title', 'description', 'tags', 'prix', 'ville', 'all']))
			return Redirect::to('/')->with('message', 'Veillez ne pas modifier le formulaire');

		if(Input::get('search_param') != 'all')
			$annonces = Annonce::orderBy($sort, $order)
				->where(Input::get('search_param'), 'like', '%'.Input::get('x').'%')
				->paginate(5);
		else
			$annonces = Annonce::orderBy($sort, $order)
				->where('title', 'like', '%'.Input::get('x').'%')
				->where('description', 'like', '%'.Input::get('x').'%', 'OR')
				->where('tags', 'like', '%'.Input::get('x').'%', 'OR')
				->where('prix', 'like', '%'.Input::get('x').'%', 'OR')
				->where('ville', 'like', '%'.Input::get('x').'%', 'OR')
				->paginate(5);

		return View::make('annonces.index', compact('annonces'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!Auth::check())
			return Redirect::to('/annonce/all')->with('message', 'Vous devez etre connecté pour acceder a cette page');

		return View::make('annonces.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(!Auth::check())
			return Redirect::to('/annonce/all')->with('message', 'Vous devez etre connecté pour acceder a cette page');

		$validator = Validator::make(Input::all(), Annonce::$rules);
		if ($validator->fails()) {
			return Redirect::to('annonce/create')
				->withErrors($validator)
				->withInput();
		} else {
			$annonce = new Annonce;
			$annonce->title  			= Input::get('title');
			$annonce->description  		= Input::get('description');
			$annonce->prix 				= Input::get('prix');
			$annonce->tags    			= Input::get('tags');
			$annonce->ville    			= Input::get('ville');
			$annonce->user_id    		= Auth::user()->id;
			$annonce->save();

			if(Input::hasFile('files'))
				foreach (Input::file('files') as $file) {
					$path = strtolower(public_path('uploads'.DIRECTORY_SEPARATOR.$annonce->id));
					$filename = strtolower($file->getClientOriginalName());
					$extension = strtolower($file->getClientOriginalExtension());
					$mime = $file->getMimeType();

					$upload = new Upload;
					$upload->user_id    		= Auth::user()->id;
					$upload->annonce_id  		= $annonce->id;
					$upload->nom 				= $filename;
					$upload->save();

					$file->move($path, $filename);
				}

			return Redirect::to('/annonce')
				->with('message', 'L\'annonce a été crée');
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
		$annonce = Annonce::findOrFail($id);
		return View::make('annonces.show', compact('annonce'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(!Auth::check())
			return Redirect::to('/annonce/all')->with('message', 'Vous devez etre connecté pour acceder a cette page');

		$annonce = Annonce::findOrFail($id);

		if(!$annonce->authorized())
			return Redirect::to('/annonce/all')->with('message', 'Cette annonce ne vous appartient pas.');
		return View::make('annonces.edit', compact('annonce'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(!Auth::check())
			return Redirect::to('/annonce/all')->with('message', 'Vous devez etre connecté pour acceder a cette page');


		$validator = Validator::make(Input::all(), Annonce::$rules);
		if ($validator->fails()) {
			return Redirect::to('annonce/' . $id . '/edit')
				->withErrors($validator)
				->withInput();
		} else {
			$annonce = Annonce::findOrFail($id);

			if(!$annonce->authorized())
				return Redirect::to('/annonce/all')->with('message', 'Cette annonce ne vous appartient pas.');

			$annonce->title  			= Input::get('title');
			$annonce->description  		= Input::get('description');
			$annonce->prix 				= Input::get('prix');
			$annonce->tags    			= Input::get('tags');
			$annonce->ville    			= Input::get('ville');
			$annonce->save();

			return Redirect::to('/annonce')
				->with('message', 'L\'annonce a bien été éditée');
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
		if(!Auth::check())
			return Redirect::to('/annonce/all')->with('message', 'Vous devez etre connecté pour acceder a cette page');

		$annonce = Annonce::findOrFail($id);

		if(!$annonce->authorized())
				return Redirect::to('/annonce/all')->with('message', 'Cette annonce ne vous appartient pas.');

		$annonce->delete();

		return Redirect::to('/annonce')
			->with('message', 'L\'annonce a bien été supprimé!');
	}
}
