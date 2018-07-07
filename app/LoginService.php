<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginService extends Model
{
    protected $fillable = ['provider', 'user_id', 'refresh_token', 'access_token', 'expires_in'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function token()
    {
        return [
            'expires_in' => $this->expires_in,
            'access_token' => $this->access_token,
            'refresh_token' => $this->refresh_token,
            'created' => $this->updated_at->getTimestamp(),
        ];
    }

    public function getAccessToken()
    {
        return $this->access_token;
    }

    public function getRefreshToken()
    {
        return $this->refresh_token;
    }
}
