<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'age',
        'address',
        'teacher_profile'
    ];

    protected function profilePhotoPath(): Attribute
    {
        return new Attribute(
            get: fn($value, $attributes) => $attributes['teacher_profile'] // If yes, return the full URL to the image from storage
                ? asset('storage/' . $attributes['teacher_profile'])
                // If no image uploaded, return a default avatar image
                : asset('images/garage.webp')
        );
    }

    /**
     * Teacher can have so many students
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    /**
     * Teacher can have many classes
     */
    public function schoolClasses()
    {
        return $this->belongsToMany(SchoolClass::class);
    }
}
