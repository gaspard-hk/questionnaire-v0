<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Questionnaire extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'questionnaire';
        protected $fillable = array('shops_id','shopnamechi','shopnameeng','shopnamejap','visiteddate','explanation',
            'attitude','sincerity','manner',
            'efficiency','tidiness','reception',
            'room','customername','customertel',
            'memberno','staffname','comment',
            'created_at','updated_at','deleted_at'
           );

}
