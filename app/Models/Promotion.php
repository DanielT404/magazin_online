<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['product_id', 'percentage', 'active'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */

    /**
     * Retrieve the product's having promotion.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getProduct()
    {
        $this->belongsTo('\App\Models\Product');
    }
}
