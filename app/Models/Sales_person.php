<?php

namespace Moriah\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales_person extends Model
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
        'email',
		'house_no', 
		'street',
		'zipcode', 
		'barangay',
		'municipality',
		'province',
		'telephone',
		'mobile',
		'gender',
		'birthdate',
		'inactive',
    ];
	
	public function sales()
    {
        return $this->hasMany('Moriah\Models\Purchase_detail');
    }		
	public function commission()
    {
        return $this->hasMany('Moriah\Models\Sales_commission');
    }	
	
}
