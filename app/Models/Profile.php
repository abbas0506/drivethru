<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'fname',
        'mname',
        'phone',
        'cnic',
        'passport',
        'address',
        'gender',
        'religion',
        'bloodgroup',
    ];
    public $timestamps = false;
}