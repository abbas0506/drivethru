<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
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
}