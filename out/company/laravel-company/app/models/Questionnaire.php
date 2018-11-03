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
        protected $fillable = array('shops_id','shopnamechi','shopnameeng','shopnamejap','visiteddate','staffname',
            'customername','customertel',
            'type',
            'lifeexplanation',
            'lifetechnique',
            'lifecomfort',
            'lifecourtesy',
            'lifeefficiency',
            'lifeappearance',
            'medicalprofessionalism',
            'medicaltechnique',
            'medicalattitude',
            'medicalexplanation',            
            'callcourtesy',
            'callexplanation',
            'callefficiency',
            'reception',
            'room',

            'comment',
            'created_at','updated_at','deleted_at'
           );

}
