<?php

class Transaction extends Eloquent {

	protected $table = 'transactions';

	protected $fillable = ['title', 'amount', 'type', 'frequency', 'user_id', 'simulation_id'];
	
	public static $rules = array(
		'title'      => 'required|max:255',
		'type'       => 'required|max:5000',
		'amount' => 'required',
		'frequency' => 'required',
		'simulation_id' => 'required'
	);

	public function user()
    {
        return $this->belongsTo('User');
    }

    public function transaction()
    {
    	return $this->belongsTo('Simulation');
    }
    
	public $timestamps = true;
}