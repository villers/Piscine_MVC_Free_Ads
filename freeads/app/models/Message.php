<?php

class Message extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'body'=>'required|min:2',
		'dest_id'=>'required|exists:users,id'
	];

	protected $guarded = ['id'];

	public function sender()
	{
		return $this->belongsTo('User', 'sender_id', 'id');;
	}

	public function recever()
	{
		return $this->belongsTo('User', 'dest_id', 'id');;
	}

	public function authorized(){
		return ($this->sender_id == Auth::user()->id || $this->dest_id == Auth::user()->id || Auth::user()->id == 1);
	}
}