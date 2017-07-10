<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Laravel\Cashier\Billable;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    use Billable;
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id','email_token','verified','username','last_login','interest','skill','mobile_contact_num','work_contact_num','home_contact_num',
        'address','is_profile_updated','first_name','last_name','city','state','zipcode','zipcode_ext','mobile_contact_ext','work_contact_ext','home_contact_ext',
        'dob','gender','is_logged_in'
    ];

    protected static $logAttributes = ['name', 'email', 'password', 'provider', 'provider_id','email_token','verified','username','last_login','interest','skill','mobile_contact_num','work_contact_num','home_contact_num',
        'address','is_profile_updated','first_name','last_name','city','state','zipcode','zipcode_ext','mobile_contact_ext','work_contact_ext','home_contact_ext',
        'dob','gender'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function verified()
    {
        $this->verified = 1;
        $this->email_token = null;
        $this->save();
    }
}
