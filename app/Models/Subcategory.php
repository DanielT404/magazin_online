<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class Subcategory extends Model

{



    /**

     *  The attributes that are mass assignable.

     *  @var array

     */

    protected $fillable = ['name', 'category_id'];



    /**

     * The attributes that should be hidden for arrays.

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


    public function products()
    {
        return $this->hasMany('\App\Models\Product');
    }

}

