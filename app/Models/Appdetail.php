<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'application_id',
        'university_id',
        'course_id',
    ];
    public $timestamps = false;
}