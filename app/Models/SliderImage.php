<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['image_path', 'active'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */

}
