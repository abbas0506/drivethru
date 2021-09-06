<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'maxhrs',
        'hourlyrate',
        'jobdeptt_id',
        'level_id',
        'country_id',
    ];
    public $timestamps = false;

    public function jobdeptt()
    {
        return $this->belongsTo(Jobdeptt::class, 'jobdeptt_id');
    }
}