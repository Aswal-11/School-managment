@extends('layouts.app')

@section('content')
<div class="p-6">

    @if (Session::has('failure'))
    <div id="flash-message"
        class=" p-1 bg-red-600 text-white rounded-lg shadow transition-opacity duration-500 ease-in-out">
        {{ Session::get('failure') }}
    </div>
    @endif

    <h2 class="text-center text-3xl font-bold mb-6 text-white">📚 School Management System</h2>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <!-- Manage Teachers -->
        <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
            <div class="flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 017 14h10a4 4 0 011.879 3.804M9 10h6m-3-7v7m-7 11h14"></path>
                </svg>
                <h5 class="text-lg font-bold">Manage Teachers</h5>
            </div>
            <p class="mt-2 text-sm text-gray-200">Add new teachers and manage profiles.</p>
            <a href="{{ route('teachers.create') }}" class="block mt-4 text-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Create Teacher</a>
        </div>

        <!-- Manage Students -->
        <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
            <div class="flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"></path>
                </svg>
                <h5 class="text-lg font-bold">Manage Students</h5>
            </div>
            <p class="mt-2 text-sm text-gray-200">Register and update student information.</p>
            <a href="{{ route('students.create') }}" class="block mt-4 text-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Create Student</a>
        </div>

        <!-- View Teachers Data -->
        <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
            <div class="flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M3 4h18M5 20h14M7 8h10"></path>
                </svg>
                <h5 class="text-lg font-bold">Teacher Data</h5>
            </div>
            <p class="mt-2 text-sm text-gray-200">Access and manage teacher profiles.</p>
            <a href="{{ route('teachers.index') }}" class="block mt-4 text-center bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">View Teachers</a>
        </div>

        <!-- View Students Data -->
        <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-lg p-6 shadow-lg hover:shadow-xl transition transform hover:-translate-y-2">
            <div class="flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                <h5 class="text-lg font-bold">Students Data</h5>
            </div>
            <p class="mt-2 text-sm text-gray-200">View and manage enrolled students.</p>
            <a href="{{ route('students.index') }}" class="block mt-4 text-center bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">View Students</a>
        </div>
    </div>
</div>
@endsection
