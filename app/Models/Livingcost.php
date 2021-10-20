<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livingcost extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'expensetype_id',
        'minexp',
        'maxexp',
    ];

    public $timestamps = false;

    public function expensetype()
    {
        return $this->belongsTo(Expensetype::class, 'expensetype_id');
    }
}
