<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admdoc extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'doc_id',
    ];

    public $timestamps = false;

    public function doc()
    {
        return $this->belongsTo(Document::class, 'doc_id');
    }
}