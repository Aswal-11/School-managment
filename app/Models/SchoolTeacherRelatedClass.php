<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolTeacherRelatedClass extends Model
{
    protected $fillable =[
        'teacher_id',
        'school_class_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }
}
