<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile_id',
        'level_id',
        'passyear',
        'rollno',
        'regno',
        'subjects',
        'biseuni',
        'obtained',
        'total',
    ];
    public $timestamps = false;
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}