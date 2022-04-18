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
        'query',
        'response', //representative response
        'mode', //national or international
    ];
    // public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}