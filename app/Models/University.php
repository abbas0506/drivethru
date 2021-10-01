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
        'type',
        'logo'
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
}