<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studycost extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'level_id',
        'cost'
    ];

    public $timestamps = false;
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}