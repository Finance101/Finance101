<?php

class Balance extends Eloquent {

	protected $table = 'balance';
	
	public $timestamps = true;

	public function user()
    {
        return $this->belongsTo('User');
    }

}