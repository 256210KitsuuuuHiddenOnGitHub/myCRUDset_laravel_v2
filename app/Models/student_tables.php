<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_tables extends Model
{
    //Disable TimeStamp
    public $timestamps = false;

    //Set Primary key based on /database/migrations/<date>studentdb
    protected $primaryKey = 'student_id';
    
    use HasFactory;
}
