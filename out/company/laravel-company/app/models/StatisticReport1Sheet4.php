<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class StatisticReport1Sheet4 extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vw_report1sheet4';
        /*
         * protected $fillable = array('shops_id','shopname','visiteddate','explanation',
         
            'attitude','sincerity','manner',
            'efficiency','tidiness','reception',
            'room','customername','customertel',
            'memberno','staffname','comment',
            'created_at','updated_at','deleted_at'
           );
        */
        
        /*
        public function getAuthIdentifier()
        {
            return $this->getKey();
        }
        
        public function getAuthPassword()
        {
            return $this->password;
        }*/
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');

}
