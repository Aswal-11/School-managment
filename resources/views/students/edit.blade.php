<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Teacher Profile</title>
    <style>
        body {
            background: linear-gradient(to top, rgb(50, 72, 101), #ebedee);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="max-w-lg w-full bg-white shadow-lg rounded-xl p-8 border border-gray-200">

        <div class="absolute top-6 right-10 max-md:inset-x-0 max-md:mx-auto max-md:w-max">
            @include('components.flash-message')
        </div>
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Edit Student Profile</h2>

        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PATCH')

            <!-- Profile Picture -->
            <div>
                <label for="student_profile_picture" class="block text-gray-700 font-medium mb-2">Profile
                    Picture</label>

                <!-- Show existing image if available -->
                @if (!empty($student->student_profile_picture))
                    <div class="mb-3">
                        <div class="w-32 h-32  border mx-auto ">
                            <img src="{{ asset('storage/' . $student->student_profile_picture) }}"
                                alt="Current Profile Picture" class="object-cover ">
                        </div>
                        <p class="text-center text-sm text-gray-500 mt-1">Current Profile Picture</p>
                    </div>
                @endif

                <!-- File Input -->
                <input type="file" name="student_profile_picture" id="student_profile_picture" accept="image/*"
                    class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400">

                @error('student_profile_picture')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700 font-medium">Student Name</label>
                <input type="text" name="name" id="name"
                    class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                    value="{{ old('name', $student->name) }}" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Age -->
            <div>
                <label for="age" class="block text-gray-700 font-medium">Age</label>
                <input type="number" name="age" id="age"
                    class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                    value="{{ old('age', $student->age) }}" required>
                @error('age')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Teacher Dropdown -->
            <div>
                <label for="student_teacher_id" class="block text-gray-700 font-medium">Select Teacher</label>
                <select name="student_teacher_id" id="student_teacher_id"
                    class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="">Select a Teacher</option>
                    @foreach ($teachers as $id => $name)
                        <option value="{{ $id }}"
                            {{ old('student_teacher_id', $student->student_teacher_id) == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('student_teacher_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Class -->
            <div>
                <label for="class" class="block text-gray-700 font-medium">Class</label>
                <input type="text" name="class" id="class"
                    class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                    value="{{ old('class', $student->class) }}" required>
                @error('class')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-gray-700 font-medium">Address</label>
                <input type="text" name="address" id="address"
                    class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                    value="{{ old('address', $student->address) }}" required>
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-3">
                <button type="submit"
                    class="w-full sm:w-auto flex-1 bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                    Update Student
                </button>
                <a href="{{ route('students.index') }}"
                    class="w-full sm:w-auto flex-1 text-center bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                    Go Back
                </a>
            </div>
        </form>
    </div>
    </div>
</body>

</html>
