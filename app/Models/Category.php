<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    /**
     * The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['name', 'image_path'];


    /**
     * The attributes that should be hidden for arrays.
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
