	<?php

class Transaction extends Eloquent {

	protected $table = 'transactions';

	protected $fillable = array('title', 'amount', 'type', 'frequency');
	
	public static $rules = array(
		'title'      => 'required|max:255',
		'type'       => 'required|max:5000'
	);

	public $timestamps = true;
}