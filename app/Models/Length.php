<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Length extends Model
{

    /**
     * The attributes that aren't mass assignable.
     *  @var array
     */
    protected $fillable = ['length'];

    /**
     * Hidden fields
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
