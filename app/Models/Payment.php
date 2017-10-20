<?php

namespace Moriah\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'purchase_detail_id',
        'installment_id',
        'payment_date',
        'AR_no',
        'OR_date',
        'OR_no',
        'OR_status',
        'fee_amount',
        'amount',
        'pcf',
        'vat',
        'total_amount',
        'details',
    ];
	
	public function customer()
    {
        return $this->belongsTo('Moriah\Models\Customer');
    }	
	
	public function sales_info()
    {
        return $this->belongsTo('Moriah\Models\Purchase_detail', 'purchase_detail_id');
    }
}
