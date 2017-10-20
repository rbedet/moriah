<?php

namespace Moriah\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sales_number',
        'transaction_date',
        'customer_id',
        'total_amount',
        'downpayment',
        'balance',
        'downpayment_date',
        'status',
        'installment_id',
    ];
}
