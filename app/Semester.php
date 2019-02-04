<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $primaryKey = 'semester_id';
    protected $fillable = ['academic_year','status','start_date','end_date', 'fees','number'];
}
