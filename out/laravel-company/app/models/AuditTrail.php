<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class AuditTrail extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'audittrail';
        protected $fillable = array('action','IP','created_at','updated_at','deleted_at');
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
