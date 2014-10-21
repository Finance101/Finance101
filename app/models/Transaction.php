	<?php

class Transaction extends Eloquent {

	protected $table = 'transactions';

	protected $fillable = array('title', 'amount', 'type', 'frequency', 'user_id');
	
	public static $rules = array(
		'title'      => 'required|max:255',
		'type'       => 'required|max:5000'
	);

	public function user()
    {
        return $this->belongsTo('User');
    }
    
	public $timestamps = true;
}