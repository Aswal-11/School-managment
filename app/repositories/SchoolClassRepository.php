<?php

namespace App\Repositories;

// Model for this repository
use App\Models\SchoolClass;

// Support Facades
use Illuminate\Support\Facades\Log;

// Exception
use Exception;

class SchoolClassRepository
{

    /**
     * Insert review 
     */
    public function insertClasses(array $input)
    {
        try {
            return SchoolClass::insert($input);
        } catch (Exception $e) {
            Log::channel('school-class')->error('[SchoolClassRepository:insertClasses] School Classes are not inserted because an exception occurred: ');
            Log::channel('school-class')->error($e->getMessage());

            return false;
        }
    }

    /**
     * Get the total number of school classes
     */
    public function getTotalSchoolClasses()
    {
        try {
            return SchoolClass::count();
        } catch (Exception $e) {
            Log::channel('school-class')->error('[SchoolClassRepository:getTotalSchoolClasses] Total school classes not fetched because an exception occurred: ');
            Log::channel('school-class')->error($e->getMessage());

            return false;
        }
    }
}
