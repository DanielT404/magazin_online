<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{

    /**
     * The attributes that aren't mass assignable.
     *  @var array
     */
    protected $fillable = ['name', 'category_id'];

    /**
     * Hidden fields
     * @var array
     */

    /**
     *
     * Get the category that belongs to the subcategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('\App\Models\Category');
    }
}
