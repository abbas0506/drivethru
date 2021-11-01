<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'city_id',
        'type',
        'rank',

    ];
    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function faculties()
    {
        $faculty_ids = Course::join('unicourses', 'unicourses.course_id', 'courses.id')
            ->where('university_id', $this->id)
            ->distinct()
            ->pluck('faculty_id')
            ->toArray();
        $faculties = Faculty::whereIn('id', $faculty_ids)->get();

        return $faculties;
    }

    public function minfee()
    {
        return Unicourse::where('university_id', $this->id)->min('fee');
    }
    public function maxfee()
    {
        return Unicourse::where('university_id', $this->id)->max('fee');
    }
    public function crsfeeById($course_id)
    {
        # code...
        $crsfee = Unicourse::where('course_id', $course_id)
            ->where('university_id', $this->id)->value('fee');
        return $crsfee;
        // return $course_id;
    }
    public function unicourses()
    {
        return $this->hasMany(Unicourse::class, 'university_id');
    }
    public function progress()
    {
        $progress = 50;
        if ($this->unicourses()->count() > 0) $progress = 100;
        return $progress;
    }
}