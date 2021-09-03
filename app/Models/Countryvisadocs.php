<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countryvisadocs extends Model
{
    use HasFactory;
    protected $fillable = [
        'doc_id',
        'country_id',
    ];
    public $timestamps = false;
}