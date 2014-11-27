<?php

class Upload extends Eloquent {
	protected $table = 'uploads';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function getUri($id)
	{
		return 'uploads/'.$id.'/'.urlencode($this->nom);
	}
}
