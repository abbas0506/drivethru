<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city_id',
        'country_id',
        'type',
        'logo'
    ];
    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function faculties()
    {
        // $courses = Course::join('unicourses', 'unicourses.course_id', 'courses.id')
        //->where('university_id', $this->id)->get();

        $faculty_ids = Course::join('unicourses', 'unicourses.course_id', 'courses.id')
            ->where('university_id', $this->id)
            ->distinct()
            //->get('faculty_id')
            ->pluck('faculty_id')
            ->toArray();
        $faculties = Faculty::whereIn('id', $faculty_ids)->get();

        return $faculties;
    }
}