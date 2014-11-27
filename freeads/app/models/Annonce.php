<?php

class Annonce extends Eloquent {

	protected $table = 'annonces';

	public static $rules = [
		'title'=>'required|min:2',
		'tags'=>'required|min:2',
		'ville'=>'required|min:2',
		'description'=>'required|min:5',
		'prix'=>'required|numeric|min:1',
		'files[]'=>'mimes:jpeg,bmp,png,gif',
	];

	public function uploads()
    {
        return $this->hasMany('Upload');
    }

    public function user()
	{
		return $this->belongsTo('User');
	}

	public function authorized(){
		return ($this->user_id == Auth::user()->id || Auth::user()->id == 1);
	}
}
