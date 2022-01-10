<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bankpayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'application_id',
        'amount',
        'dateon',
        'bank',
        'challan',
        'scancopy',
    ];
}