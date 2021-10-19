<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'usertype',
        'pic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function profile()
    {
        return $this->hasMany(Profile::class, 'user_id')->first();
    }
    public function academics()
    {
        return $this->hasMany(Academic::class, 'user_id')->get();
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'user_id')->get();
    }

    public function counsellings()
    {
        return $this->hasMany(Counselling::class, 'user_id')->get();
    }

    public function hasProfile()
    {
        if ($this->profile()) return true;
        else return false;
    }
    public function hasAcademics()
    {
        return count($this->academics());
    }
    public function hasFinishedProfile()
    {
        if ($this->hasProfile() && $this->hasAcademics()) return true;
        else return false;
    }
}