<?php

namespace App\Http\Controllers;

// Models
use App\Models\Student;
use App\Models\Teacher;

// Requests
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{

    // show the data on the frontend side
    public function index(Request $request)
    {
        // Handle search input
        if ($request->has('search')) {
            Session::put('student_search', $request->input('search'));
        } elseif ($request->has('reset')) {
            Session::forget('student_search');
        }
    
        $search = Session::get('student_search');
    
        $students = Student::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->paginate(10);
    
        // Flash message only when not searching
        if (!$search) {
            Session::flash('success', 'Students details are fetched successfully');
        }
    
        return view('students.index', compact('students', 'search'));
    }

    //Open the form to create the student
    public function create()
    {
        $teachers = Teacher::pluck('name', 'id');
        return view('students.create', compact('teachers'));
    }

    // store the form data in students table
    public function store(StudentRequest $request)
    {
        $input = $request->validated();

        Student::create($input);

        if ($input) {
            Session::flash('success', 'The student details are submittted successfully.');

            return redirect()->route('students.create');
        } else {
            Session::flash('success', 'The student details are not submitted because of am error.');

            return redirect()->route('teachers.create');
        }
    }

    // Edit the form data 
    public function edit(Student $student)
    {
        $teachers = Teacher::pluck('name', 'id');
        return view('students.edit', compact('student', 'teachers'));
    }

    //Update the Student Profile
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $update = $request->validated();

        if (isset($update['student_profile_picture'])) {
            /**
             * Remove icon from storage if exists.
             */
            if ($student->student_profile_picture && Storage::disk('public')->exists($student->student_profile_picture)) {
                Storage::disk('public')->delete($student->student_profile_picture);
            }
            /**
             * Add new icon to storage.
             */
            $student_profile_picture = Storage::disk('public')->put('student/', $update['student_profile_picture']);

            $update['student_profile_picture'] = 'student/' . basename($student_profile_picture);
        }

        if ($update) {
            Session::flash('success', 'The student details are updated successfully.');

            $student->update($update);

            return redirect()->route('students.edit', $student->id);
        } else {
            Session::flash('failure', 'The student details are not updated successfully.');

            return redirect()->route('teachers.edit', $student->id);
        }
    }

    // Delete Student
    public function destroy(Student $id)
    {
        $student = $id;

        if ($student) {
            Session::flash('success', 'Student is deleted successfully.');

            $student->delete();

            return redirect()->route('students.index');
        }else{
            Session::flash('failure', 'Student not deleted successfully.');

            return redirect()->route('teachers.index');
        }
    }
}
