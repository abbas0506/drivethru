<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unicourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'university_id',
        'course_id',
        'duration',
        'fee',
        'studycost',
        'criteria',
        'requirement',
        'closing',
        'lastmerit',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}