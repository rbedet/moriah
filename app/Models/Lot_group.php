<?php

namespace Moriah\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lot_group extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the products for the brand.
     */
    public function lots()
    {
        return $this->hasMany('Moriah\Models\Lot','lot_type_id','lot_group_id');
    }
	
    public function lot_type()
    {
        return $this->hasMany('Moriah\Models\Lot_type');
    }
	
}
