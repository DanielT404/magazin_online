<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['name', 'description', 'image', 'currency', 'price', 'color_option', 'length_option', 'featured'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */

    /**
     * Retrieve the color of the product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getColor()
    {
        return $this->belongsTo('\App\Models\Color', 'color_id');
    }

    /**
     * Retrieve the length of the product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getLength()
    {
        return $this->belongsTo('\App\Models\Length', 'length_id');
    }

    /**
     * Retrieve the product's promotion.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getPromotion()
    {
        return $this->hasMany('\App\Models\Promotion');
    }
}
