<?php

namespace Moriah\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase_detail extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sales_person_id',
        'customer_id',
        'lot_id',
        'lot_price',
        'pcf_amount',
        'vat_amount',
        'fee_amount',
        'total_lot_price',
        'downpayment',
        'downpayment_date',
        'balance',
    ];
	public function customer()
    {
        return $this->belongsTo('Moriah\Models\Customer');
    }	
	public function lot_info()
    {
        return $this->belongsTo('Moriah\Models\Lot', 'lot_id');
    }	
	
	public function sales_person()
    {
        return $this->belongsTo('Moriah\Models\Sales_person');
    }	
	
	public function payments()
    {
        return $this->hasMany('Moriah\Models\Payment');
    }	
	
	public function commission()
    {
        return $this->hasOne('Moriah\Models\Sales_commission', 'purchase_detail_id', 'id');
    }	
	
	public function installment()
    {
        return $this->hasOne('Moriah\Models\Installment');
    }
}
