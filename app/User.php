<?php

namespace App;

use Laravel\Spark\CanJoinTeams;
use Laravel\Spark\User as SparkUser;
use Revolution\Google\Sheets\Traits\GoogleSheets;

use App\LoginService;

class User extends SparkUser
{
    use GoogleSheets;

    use CanJoinTeams;

    protected $with = ['services'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'phone',
        'authy_id',
        'password',
        'card_brand',
        'billing_zip',
        'card_country',
        'billing_city',
        'country_code',
        'remember_token',
        'card_last_four',
        'billing_address',
        'billing_country',
        'billing_address_line_2',
        'extra_billing_information',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trial_ends_at' => 'datetime',
        'uses_two_factor_auth' => 'boolean',
    ];

    /**
     * Get the Access Token
     *
     * @return string|array
     */
    public function sheetsAccessToken($provider)
    {
        return $this->service($provider)->token();
    }

    public function addService($provider, $credentials)
    {
        $service = new LoginService;

        /**
         * ==============================================================================================
         * TODO: Need to implement logic to check if we want to add a new service or update a service
         * ==============================================================================================
         * Currently: We're just deleting all services from same provider before adding a new one
         * This is incorrect and eventually needs to be corrected
         */
        $duplicates = $this->services()->where('provider', $provider);

        $duplicates->each(function($service) 
        { 
        
            $service->delete(); 
        
        });

        $service->refresh_token = $credentials['refresh_token'];
        $service->access_token = $credentials['access_token'];
        $service->expires_in = $credentials['expires_in'];
        $service->provider = $provider;
        $service->user_id = $this->id;
        $service->save();
    }

    public function service($provider)
    {
        return $this->services($provider)
                    ->where('provider', $provider)
                    ->first();
    }

    public function services()
    {
        return $this->hasMany(LoginService::class);
    }

    public function accessToken($provider)
    {
        return $this->service($provider)->access_token;
    }
}
