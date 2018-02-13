<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{

    /**
     * The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['color'];

    /**
     * The attributes that should be hidden for arrays.
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
