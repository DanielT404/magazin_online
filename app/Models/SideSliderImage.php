<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SideSliderImage extends Model
{
    /**
     *  The attributes that are mass assignable.
     *  @var array
     */
    protected $fillable = ['path_image', 'active'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
}
