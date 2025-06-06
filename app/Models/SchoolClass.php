<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    /**
     * The  attributes that are mass assignable
     */
    protected $fillable =[
        'class_name',
    ];

    /**
     * Class can have many teachers
     */
    public function teacher()
    {
        return $this->belongsToMany(Teacher::class,'school_teacher_related_classes','school_class_id', 'teacher_id');
    }
}
