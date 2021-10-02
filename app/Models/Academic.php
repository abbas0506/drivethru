<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam',
        'year',
        'board',
        'institution',
        'rollno',
        'regno',
        'obtained',
        'total',
    ];

    public $timestamps = false;
}