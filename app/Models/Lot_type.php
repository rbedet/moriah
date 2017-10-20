<?php

namespace Moriah\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lot_type extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lot_group_id',
        'description',
		'price',
		'pcf_percent',
		'vat_percent',
    ];
	
    /**
     * Get the lot group that the lot type belongs to.
     */
    public function lot_group()
    {
        return $this->belongsTo('Moriah\Models\Lot_group', 'lot_group_id');
    }
	public function lot()
    {
        return $this->hasMany('Moriah\Models\Lot');
    }
	
}
