<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselling extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'option1',
        'option2',
        'option3',
        'option4',
        'option5',
        'qrydetail',
        'status',
    ];
    // public $timestamps = false;
}