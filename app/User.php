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
        'password',
        'remember_token',
        'authy_id',
        'country_code',
        'phone',
        'card_brand',
        'card_last_four',
        'card_country',
        'billing_address',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
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
        return [
            'access_token'  => $this->accessToken($provider),
            'refresh_token' => $this->refreshToken($provider),
            'expires_in'    => 3600,
            'created'       => $this->updated_at->getTimestamp(),
        ];
    }

    public function addService($provider, $credentials)
    {
        $service = new LoginService;

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
        return $this->services($provider)
                    ->where('provider', $this->service)
                    ->get('access_token');
    }

    public function refreshToken($provider)
    {
        return $this->services($provider)
                    ->where('provider', $this->service)
                    ->get('refresh_token');
    }
}
