<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExistKhtiReceipt extends Model
{
    use HasFactory;

    protected $table = "exist_khti_receipts";

    protected $fillable = [
        'user_id',
        'account_id',
        'receipt_no',
        'receipt_date',
        'b_adhi',
        'total_collection',
        'total',
    ];
}
