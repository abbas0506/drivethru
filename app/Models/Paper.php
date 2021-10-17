<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'papertype_id',
        'pic',
        'url',
    ];
    public $timestamps = false;
    public function papertype()
    {
        return $this->belongsTo(PaperType::class, 'papertype_id');
    }
}