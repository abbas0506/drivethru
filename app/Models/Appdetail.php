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

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public $timestamps = false;
}