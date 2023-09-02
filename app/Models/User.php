<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'username',
        'password',
        'role_id',
        'is_active',
    ];

//    public function company()
//    {
//        return $this->belongsTo(Company::class);
//    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }




}
