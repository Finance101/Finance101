<?php

class Goal extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	public function user()
	{
		return $this->belongsTo('User');
	}

	// Don't forget to fill this array
	protected $fillable = [];

}