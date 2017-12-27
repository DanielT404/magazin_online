<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable
{


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'home_address', 'delivery_address', 'telephone_number'];


    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = ['password'];


    /**
     * Get client's orders.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('\App\Models\Order');
    }
}
