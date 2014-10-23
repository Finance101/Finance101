<?php

class Simulation extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'title' => 'required'
	];

	public function user() 
	{
		return $this->belongsTo('User');
	}

	public function transaction()
	{
		return $this->hasMany('Transaction');
	}

	// Don't forget to fill this array
	protected $fillable = ['title', 'user_id'];

}