<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
     // thay ở đây
    protected $fillable = [
        "name",
        "email",
        "phone",
        "student_class",
        "mark"
    ];
}
