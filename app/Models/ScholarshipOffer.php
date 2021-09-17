<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipOffer extends Model
{
    use HasFactory;
    protected $fillable = [
        'scholarship_id',
        'country_id',
    ];
    public $timestamps = false;

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class, 'scholarship_id');
    }
}