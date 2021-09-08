<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'visarequired',
        'visaduration',
        'livingcost',
        'lifethere',
        'jobdesc',
        'flag',
        'step1',
        'step2',
        'step3',
        'step4',
    ];

    public $timestamps = false;

    //visa docs
    public function countryvisadocs()
    {
        return $this->hasMany(Countryvisadoc::class, 'country_id');
    }
    public function countryjobs()
    {
        return $this->hasMany(CountryJob::class, 'country_id');
    }

    public function visadocs()
    {

        $mycollection = collect();
        foreach ($this->countryvisadocs()->get() as $countryvisadoc) {
            $mycollection->add($countryvisadoc->doc);
        }
        return $mycollection;
    }

    public function not_visadocs()
    {

        $visadoc_ids = $this->visadocs()->pluck('id')->toArray();
        $docs = Document::whereNotIn('id', $visadoc_ids)->get();
        return $docs;
    }

    //scholarships

    public function countryscholarships()
    {
        return $this->hasMany(Countryscholarship::class, 'country_id');
    }

    public function scholarships()
    {

        $mycollection = collect();
        foreach ($this->countryscholarships()->get() as $countryscholarship) {
            $mycollection->add($countryscholarship->scholarship);
        }
        return $mycollection;
    }

    public function not_scholarships()
    {

        $scholarship_ids = $this->scholarships()->pluck('id')->toArray();
        $scholarships = Scholarship::whereNotIn('id', $scholarship_ids)->get();
        return $scholarships;
    }
}