<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_id',
        'is_active',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }


    public function courses()
    {
        return $this->hasMany(Course::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
