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
        'flag',
    ];

    public $timestamps = false;

    public function countryvisadocs()
    {
        return $this->hasMany(Countryvisadoc::class, 'country_id');
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
}