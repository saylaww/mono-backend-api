<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        "group_id",
        "student_id",
        "test",
        "ras",
    ];

    protected $table = 'group_student';




}
