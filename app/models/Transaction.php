<?php

class Transaction extends Eloquent {

	protected $table = 'transactions';
	public static $rules = array(

		// 'name'		 => 'required|between:1,10',
			'name'      => 'required|max:255',
    		'credit'       => 'required|max:5000',
    		'credit'       => 'required|max:5000',
    		//'email' => 'unique:users'


		);


	public $timestamps = true;

}