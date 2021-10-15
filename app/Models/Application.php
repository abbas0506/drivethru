<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'charges',
        'ispaid',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appdetails()
    {
        return $this->hasMany(Appdetail::class, 'application_id')->get();
    }
    public function universities()
    {
        $university_ids = Appdetail::where('application_id', $this->id)->distinct()->pluck('university_id')->toArray();
        $universities = University::whereIn('id', $university_ids)->get();
        return $universities;
    }
    public function courses()
    {
        $course_ids = Appdetail::where('application_id', $this->id)->distinct()->pluck('course_id')->toArray();
        $courses = Course::whereIn('id', $course_ids)->get();
        return $courses;
    }
    // public $timestamps = false;
}