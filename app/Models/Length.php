<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Length extends Model
{

    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['length'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */

    /**
     * Get products which have a specific length
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getProducts()
    {
        return $this->hasMany('\App\Models\Product');
    }
}
