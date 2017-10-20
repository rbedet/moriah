<?php

namespace Moriah\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lot extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'block',
        'lot',
        'description',
        'status',
        'lot_type_id',
        'lot_group_id',
    ];

    /**
     * Get the lot group that the lot belongs to.
     */
    public function lot_group()
    {
        return $this->belongsTo('Moriah\Models\Lot_group');
    }
             
    /**
     * Get the lot type that the lot belongs to.
     */
    public function lot_type()
    {
		return $this->belongsTo('Moriah\Models\Lot_type');
    }
}
