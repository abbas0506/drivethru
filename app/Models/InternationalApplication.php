<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'application_id',
        'country_id',
        'course_id',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}