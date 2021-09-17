<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'intro',
        'flag',
        'currency',
        'visarequired',
        'visaduration',
        'lifethere',
        'jobdesc',

        'step1',
        'step2',
        'step3',
        'step4',
        'step5',
        'step6',
    ];

    public $timestamps = false;

    //visa docs
    public function countryvisadocs()
    {
        return $this->hasMany(Countryvisadoc::class, 'country_id');
    }

    // public function visadocs()
    // {

    //     $mycollection = collect();
    //     foreach ($this->countryvisadocs()->get() as $countryvisadoc) {
    //         $mycollection->add($countryvisadoc->doc);
    //     }
    //     return $mycollection;
    // }

    // public function not_visadocs()
    // {

    //     $visadoc_ids = $this->visadocs()->pluck('id')->toArray();
    //     $docs = Document::whereNotIn('id', $visadoc_ids)->get();
    //     return $docs;
    // }

    //scholarships

    public function countryscholarships()
    {
        return $this->hasMany(Countryscholarship::class, 'country_id');
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

    public function scholarships()
    {
        return $this->hasMany(ScholarshipOffer::class, 'country_id')->get();
    }
    public function xscholarships()
    {
        $xscholarships_ids = ScholarshipOffer::where('country_id', $this->id)->pluck('scholarship_id')->toArray();
        $xscholarships = Scholarship::whereNotIn('id', $xscholarships_ids)->get();
        return $xscholarships;
    }
}