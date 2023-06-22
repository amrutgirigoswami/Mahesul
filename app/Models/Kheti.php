<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kheti extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Khetis';

    protected $fillable = [

        'account_id',
        'auth_id',
        'account_holder_name',
        'mulatvi',
        'sarkari',
        'local',
        'farti',
        'total',
        'chhut',
        'past_jadde',
        'charges_arrival',
        'total_collection',
        'chargeable',
        'remaining',
        'next_year_jadde',
        'receipt_no',
        'receipt_date',
        'b_adhi',
        'total_demand',
        'total_receipt_collection',
        'year',
        'status',

    ];
}
