<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{


    /**
     * The attributes that aren't mass assignable.
     *  @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'home_address', 'delivery_address', 'telephone_number'];


    /**
     * Hidden fields
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
