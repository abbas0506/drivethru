<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;

    public function courses()
    {
        return Course::where('faculty_id', $this->id)->get();
    }

    public function unicourses()
    {
        $university = session('university');
        //pluck course ids of this faculty
        $course_ids = Course::where('faculty_id', $this->id)
            ->pluck('id')
            ->toArray();

        //return faculty courses for selected uni
        return Unicourse::where('university_id', $university->id)
            ->whereIn('course_id', $course_ids)
            ->get();
    }
}