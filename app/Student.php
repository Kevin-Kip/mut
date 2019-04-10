<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'student_id';

    protected $fillable = ['name', 'registration', 'program', 'email', 'fee_balance', 'student_category'];
}
