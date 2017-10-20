<?php

namespace Moriah\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales_commission extends Model
{
    use SoftDeletes;
	
	 protected $fillable = [
        'commission_percentage',
        'sales',
        'earned_commission',
        'sales_person_id',
        'purchase_detail_id',
    ];
	
	public function sales_person()
    {
        return $this->belongsTo('Moriah\Models\Sales_person', 'sales_person_id');
    }	
	
	public function sales()
    {
        return $this->belongsTo('Moriah\Models\Purchase_detail', 'purchase_detail_id');
    }	
	
	
}
