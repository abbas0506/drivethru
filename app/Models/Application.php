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

    public function national_applications()
    {
        return $this->hasMany(NationalApplication::class, 'application_id')->get();
    }
    public function universities()
    {
        $university_ids = NationalApplication::where('application_id', $this->id)->distinct()->pluck('university_id')->toArray();
        $universities = University::whereIn('id', $university_ids)->get();
        return $universities;
    }
    // public function courses()
    // {
    //     $course_ids = NationalApplication::where('application_id', $this->id)->distinct()->pluck('course_id')->toArray();
    //     $courses = Course::whereIn('id', $course_ids)->get();
    //     return $courses;
    // }
    public function international_applications()
    {
        return $this->hasMany(InternationalApplication::class, 'application_id')->get();
    }
    public function countries()
    {
        $country_ids = InternationalApplication::where('application_id', $this->id)->distinct()->pluck('country_id')->toArray();
        $countries = Country::whereIn('id', $country_ids)->get();
        return $countries;
    }
}