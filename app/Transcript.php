<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transcript extends Model
{
    protected $fillable = [
        'transcript_id',
        'student',
        'semester'
    ];
}
