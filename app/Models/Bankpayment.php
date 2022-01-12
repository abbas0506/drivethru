<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bankpayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'application_id',
        'dateon',
        'bank',
        'branch',
        'challan',
        //'amount',
        'scancopy',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
