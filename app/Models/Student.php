<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable =[
       'student_profile_picture',
       'name',
       'age',
       'class',
       'student_teacher_id',
       'address'
    ];

    /**
     * Accessor for the full URL of the student's profile photo.
     * 
     * This accessor helps in generating the complete image path.
     * If the student has uploaded a photo, it returns the public URL.
     * If not, it returns a default placeholder image.
     *
     * Usage: $student->profilePhotoPath
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function profilePhotoPath(): Attribute
    {
        return new Attribute(
            // This function is triggered when you access $student->profilePhotoPath
            get: fn($value, $attributes) =>
                
                // Check if 'profile_photo' column has a value (i.e., user uploaded an image)
                $attributes['student_profile_picture']

                    // If yes, return the full URL to the image from storage
                    ? asset('storage/' . $attributes['student_profile_picture'])
                    // If no image uploaded, return a default avatar image
                    : asset('images/garage.webp')
        );
    }

    // public function teacher()
    // {
    //     return $this->belongsToMany(Teacher::class, 'school_teacher_related_classes', 'school_class_id', 'teacher_id');
    // }
}
