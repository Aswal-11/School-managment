<?php

namespace App\Http\Controllers;

//Models
use App\Models\Teacher;

// Requests
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
// Session
use Illuminate\Support\Facades\Session;

// Storage
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a list of teachers.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            Session::put('teacher_search', $request->input('search'));
        } elseif($request->has('reset')){
            Session::forget('teacher_search');
        }

        $search = Session::get('teacher_search');

        $teachers = Teacher::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

          // Flash message only when not searching
        if (!$search) {
            Session::flash('success', 'Teachers details are fetched successfully');
        }
            return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form to create a teacher.
     */
    public function create()
    {
        $schoolClasses = SchoolClass::pluck('class_name', 'id');
        return view('teachers.create', compact('schoolClasses'));
    }

    /**
     * Store the teacher details in the database.
     */
    public function store(TeacherRequest $request)
    {
        $input = $request->validated();

        $schoolClasses = $input['school_class_id'];

        unset($input['school_class_id']);

        if ($input) {
            Session::flash('success', 'The teacher details are submittted successfully.');

            Teacher::create($input);

            return redirect()->route('teachers.create');
        } else {
            Session::flash('failure', 'The teacher details are not submitted because of am error.');

            return redirect()->route('teachers.create');
        }
    }

    /**
     * Edit the teacher data
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the teacher data
     */

    public function update(TeacherUpdateRequest $request, Teacher $teacher)
    {
        $update = $request->validated();

        if (isset($update['teacher_profile'])) {
            /**
             * Remove icon from storage if exists.
             */
            if ($teacher->teacher_profile && Storage::disk('public')->exists($teacher->teacher_profile)) {
                Storage::disk('public')->delete($teacher->teacher_profile);
            }
            /**
             * Add new icon to storage.
             */
            $teacher_profile = Storage::disk('public')->put('teacher/', $update['teacher_profile']);

            $update['teacher_profile'] = 'teacher/' . basename($teacher_profile);
        }

        if ($update) {
            Session::flash('success', 'The teacher details are updated successfully.');

            $teacher->update($update);

            return redirect()->route('teachers.edit', $teacher->id);
        } else {
            Session::flash('failure', 'The teacher details are not updated successfully.');

            return redirect()->route('teachers.edit', $teacher->id);
        }
    }

    /**
     * delete the teacher data
     */
    public function destroy(Teacher $id)
    {
        $teacher = $id;
        if ($teacher) {
            Session::flash('success', 'Teacher deleted successfully.');

            $teacher->delete();

            return redirect()->route('teachers.index');
        }else{
            Session::flash('failure', 'Teacher not deleted successfully.');

            return redirect()->route('teachers.index');
        }
    }
}
