<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'gender',
        'dob',
        'fname',
        'mname',
        'cnic',
        'passport',
        'address',
        'religion',
        'bloodgroup',
    ];
    public $timestamps = false;
    protected $dateFormat = 'Y-m-d';
    protected $dates = ['dob'];

    public function academics()
    {
        return $this->hasMany(Academic::class, 'profile_id')->get();
    }
}