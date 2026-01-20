@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-10">
        {{-- Alert Message --}}
        @if (Session::has('failure'))
            <div role="alert" class="mb-6 rounded-lg bg-red-600 text-white p-4 shadow-md transition duration-300">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium">{{ Session::get('failure') }}</span>
                    <button onclick="this.closest('div[role=alert]').remove()" aria-label="Close alert" class="ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 ">School Management System</h1>
            <p class="mt-2 text-lg text-gray-600">Streamlined dashboard for school administration</p>
        </div>

        {{-- Cards --}}
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @php
                $cards = [
                    [
                        'title' => 'Manage Teachers',
                        'desc' => 'Add and configure teaching staff',
                        'route' => route('teachers.create'),
                        'btn' => 'Add Teacher',
                        'icon' =>
                            '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
                        'color' => 'bg-blue-100 text-blue-600',
                    ],
                    [
                        'title' => 'Manage Students',
                        'desc' => 'Register and manage student records',
                        'route' => route('students.create'),
                        'btn' => 'Enroll Student',
                        'icon' =>
                            '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>',
                        'color' => 'bg-purple-100 text-purple-600',
                    ],
                    [
                        'title' => 'Teacher Directory',
                        'desc' => 'View and manage faculty profiles',
                        'route' => route('teachers.index'),
                        'btn' => 'View Faculty',
                        'icon' =>
                            '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
                        'color' => 'bg-green-100 text-green-600',
                    ],
                    [
                        'title' => 'Student Roster',
                        'desc' => 'Access complete student database',
                        'route' => route('students.index'),
                        'btn' => 'View Students',
                        'color' => 'bg-teal-600 hover:bg-teal-700 focus:ring-teal-500',
                        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>',
                    ],
                ];
            @endphp

            @foreach ($cards as $card)
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="{{ $card['color'] }} p-3 rounded-lg mr-4">
                                {!! $card['icon'] !!}
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800">{{ $card['title'] }}</h3>
                        </div>
                        {{-- <p class="text-gray-600 mb-6">{{ $card['description'] }}</p> --}}
                        <a href="{{ $card['route'] }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                            Access Module
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
