<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    /**
     * The attributes that aren't mass assignable.
     *  @var array
     */
    protected $fillable = ['color'];

    /**
     * Hidden fields
     * @var array
     */

    /**
     * Get the products which have a specific color
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getProducts()
    {
        return $this->hasMany('\App\Models\Product');
    }

}
