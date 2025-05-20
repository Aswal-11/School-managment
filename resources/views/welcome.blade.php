@extends('layouts.app')

@section('content')


    @if (Session::has('failure'))
        <div id="flash-message" class="p-2 mb-4 bg-red-600 text-white rounded-lg shadow">
            {{ Session::get('failure') }}
        </div>
    @endif

    <h2 class="text-center text-4xl font-extrabold mb-10 text-white drop-shadow">📚 School Management System</h2>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        
        {{-- Reusable card component --}}
        @php
            $cards = [
                [
                    'title' => 'Manage Teachers',
                    'desc' => 'Add new teachers',
                    'route' => route('teachers.create'),
                    'btn' => 'Create Teacher',
                    'color' => 'bg-blue-500 hover:bg-blue-600',
                    'image' => '/images/teacher.png', // Make sure this exists in public/images
                ],
                [
                    'title' => 'Manage Students',
                    'desc' => 'Add new students',
                    'route' => route('students.create'),
                    'btn' => 'Create Student',
                    'color' => 'bg-green-500 hover:bg-green-600',
                    'image' => '/images/student.png',
                ],
                [
                    'title' => 'Teacher Data',
                    'desc' => 'Access and manage teacher profiles.',
                    'route' => route('teachers.index'),
                    'btn' => 'View Teachers',
                    'color' => 'bg-yellow-500 hover:bg-yellow-600',
                    'image' => '/images/data.png',
                ],
                [
                    'title' => 'Students Data',
                    'desc' => 'View and manage enrolled students.',
                    'route' => route('students.index'),
                    'btn' => 'View Students',
                    'color' => 'bg-teal-500 hover:bg-teal-600',
                    'image' => '/images/list.png',
                ]
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="bg-white bg-opacity-10 backdrop-blur-xl rounded-2xl p-6 shadow-xl hover:shadow-2xl transition transform hover:-translate-y-2 border border-white/10">
                <div class="flex flex-col items-center text-center">
                    <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}" class="w-20 h-20 mb-4 rounded-full shadow-lg object-cover bg-white/20 p-2">
                    <h5 class="text-xl font-bold">{{ $card['title'] }}</h5>
                    <p class="mt-2 text-sm text-gray-300">{{ $card['desc'] }}</p>
                    <a href="{{ $card['route'] }}" class="mt-4 {{ $card['color'] }} text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
                        {{ $card['btn'] }}
                    </a>
                </div>
            </div>
        @endforeach

    </div>

@endsection
