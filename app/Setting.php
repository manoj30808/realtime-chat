<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
{
    use LogsActivity;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings';
	
	protected static $logAttributes = ['login_with','interest','skill','state','twitter_client_id','twitter_client_secret','google_client_id','google_client_secret','facebook_client_id','facebook_client_secret','pinterest_client_id','pinterest_client_secret','linkedin_client_id','linkedin_client_secret','mail_driver','mail_host','mail_port','mail_username','mail_password','mail_encryption','after_register'];

    protected $guarded = [];
}