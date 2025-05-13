<?php

namespace Database\Seeders;

use App\Repositories\SchoolClassRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolClasses = new SchoolClassRepository;

        $numberOfSchoolClasses= $schoolClasses->getTotalSchoolClasses();

            if ($numberOfSchoolClasses==0) {

                // School classes to seed, adding created_by_id and updated_by_id in one step
                $classes = [
                    ['class_name' => 'Pre-Nursery', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Nursery', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'LKG', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'UKG', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 1', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 2', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 3', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 4', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 5', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 6', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 7', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 8', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 9', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 10', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 11', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                    ['class_name' => 'Class 12', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
                ];
        }
         
        // Insert all classes
        (new SchoolClassRepository)->insertClasses($classes);
    }
}
