<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;

class Student extends Model
{
    // use HasFactory;

    protected $table = 'student';
    protected $primaryKey = 'student_id';
    public $timestamps = false;
    protected $fillable = [
        'student_id',
        'nim',
        'nama',
        'jurusan',
    ];
}
