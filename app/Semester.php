<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, int $id)
 */
class Semester extends Model
{
    protected $primaryKey = 'semester_id';
    protected $fillable = ['academic_year','program','status','start_date','end_date', 'student_category', 'fees','number'];
}
