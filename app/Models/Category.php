<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    /**
     * The attributes that aren't mass assignable.
     *  @var array
     */
    protected $fillable = ['name'];


    /**
     * Hidden fields
     * @var array
     */


    /**
     * Get subcategories of the existing category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategories()
    {
        return $this->hasMany('\App\Models\Subcategory');
    }
}
