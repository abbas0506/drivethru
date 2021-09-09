<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'faculty_id',
        'level_id',
    ];

    public $timestamps = false;
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}