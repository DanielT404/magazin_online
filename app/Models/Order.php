<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that aren't mass assignable.
     *  @var array
     */
    protected $fillable = ['client_id', 'product_id', 'quantity', 'total_price', 'approved'];

    /**
     * Hidden fields
     * @var array
     */

    /**
     * Get informations about the order's client.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getClient()
    {
        return $this->belongsTo('\App\Models\Client');
    }

    /**
     * Get informations about the order's product.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getProduct()
    {
        return $this->belongsTo('\App\Models\Product');
    }
}
