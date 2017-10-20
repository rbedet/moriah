<?php

namespace Moriah\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Installment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'purchase_detail_id',
        'payment_term',
        'interest_rate',
        'monthly_amortization',
		'principal',
		'interest',
        'start_date',
        'end_date',
        'status',
    ];
}
