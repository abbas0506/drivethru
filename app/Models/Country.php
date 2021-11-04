<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'flag',
        'intro',
        'edufree',
        'essential',
        'lifethere',
        'jobdesc',
        'livingcostdesc',
    ];

    public $timestamps = false;

    //specific country visa docs
    public function visadocs()
    {
        return $this->hasMany(Visadoc::class, 'country_id')->get();
    }
    public function xvisadocs()
    {
        $xvisadoc_ids = Visadoc::where('country_id', $this->id)->pluck('doc_id')->toArray();
        $xvisadocs = Document::whereNotIn('id', $xvisadoc_ids)->get();
        return $xvisadocs;
    }

    // spcicific country admission docs
    public function admdocs()
    {
        return $this->hasMany(Admdoc::class, 'country_id')->get();
    }
    public function xadmdocs()
    {
        $xadmdoc_ids = Admdoc::where('country_id', $this->id)->pluck('doc_id')->toArray();
        $xadmdocs = Document::whereNotIn('id', $xadmdoc_ids)->get();
        return $xadmdocs;
    }

    //specific country scholarsips
    public function scholarships()
    {
        return $this->hasMany(ScholarshipOffer::class, 'country_id')->get();
    }

    // public function scholarship_offers()
    // {
    //     return $this->hasMany(ScholarshipOffer::class, 'country_id')->get();
    // }
    public function xscholarships()
    {
        $xscholarships_ids = ScholarshipOffer::where('country_id', $this->id)->pluck('scholarship_id')->toArray();
        $xscholarships = Scholarship::whereNotIn('id', $xscholarships_ids)->get();
        return $xscholarships;
    }

    public function funiversities()
    {
        return $this->hasMany(Funiversity::class, 'country_id')->get();
    }

    public function favcourses()
    {
        return $this->hasMany(Favcourse::class, 'country_id')->get();
    }


    public function xfavcourses()
    {
        $favcourse_ids = Favcourse::where('country_id', $this->id)->pluck('course_id')->toArray();
        $xfavcourses = Course::whereNotIn('id', $favcourse_ids)->get();
        return $xfavcourses;
    }

    public function progress()
    {
        $progress = 30;
        if ($this->visadocs()->count() > 0) $progress += 10;
        if ($this->admdocs()->count() > 0) $progress += 10;
        if ($this->scholarships()->count() > 0) $progress += 10;
        if ($this->funiversities()->count() > 0) $progress += 10;
        if ($this->favcourses()->count() > 0) $progress += 10;
        if ($this->studycosts()->count() > 0) $progress += 10;
        if ($this->livingcosts()->count() > 0) $progress += 10;

        return $progress;
    }
    public function studycosts()
    {
        return $this->hasMany(Studycost::class, 'country_id')->get();
    }
    public function livingcosts()
    {
        return $this->hasMany(Livingcost::class, 'country_id')->get();
    }
    public function studylevels()
    {
        $studylevel_ids = Studycost::where('country_id', $this->id)->distinct()->pluck('level_id')->toArray();
        $studylevels = Level::whereIn('id', $studylevel_ids)->get();
        return $studylevels;
    }
    //cost range computation
    public function studycost()
    {
        $min = $this->studycosts()->min('minfee');
        $max = $this->studycosts()->max('maxfee');
        return $min . "-" . $max;
    }
    public function livingcost()
    {
        $min = $this->livingcosts()->min('minexp');
        $max = $this->livingcosts()->max('maxexp');
        return $min . "-" . $max;
    }
}