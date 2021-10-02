<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'fname',
        'mname',
        'cnic',
        'passport',
        'address',
        'gender',
        'religion',
        'bloodgroup',
        'email',
        'pic',
    ];
    public $timestamps = false;
}