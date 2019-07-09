<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MstCustomer extends Authenticatable implements JWTSubject
{
    protected $table = 'mst_customer';
    protected $primaryKey = 'customer_id';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'customer_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @override JWTSubject
     *
     * Get value of model primary key
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @override JWTSubject
     *
     * Customize claims of JWT
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
