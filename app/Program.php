<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $primaryKey = "program_id";

    protected $fillable = [
      "name"
    ];
}
