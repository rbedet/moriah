<?php

namespace Moriah\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deceased extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
		'birthdate',
		'deathdate',
		'lot_id',
		'notes',
    ];
	
	public function lot()
    {
        return $this->BelongsTo('Moriah\Models\Lot');
    }	
	
}
