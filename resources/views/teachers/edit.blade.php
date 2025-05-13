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
        
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Update Teacher Profile</h2>
            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                 <!-- Profile Picture -->
                 <div>
                    <label for="teacher_profile" class="block text-gray-700 font-medium mb-2">Profile Picture</label>

                    <!-- Show existing image if available -->
                    @if (!empty($teacher->teacher_profile))
                        <div class="mb-3">
                           <div class="w-32 h-32  border mx-auto ">
                            <img src="{{ asset('storage/' . $teacher->teacher_profile) }}"
                            alt="Current Profile Picture" class="object-cover ">
                           </div>
                            <p class="text-center text-sm text-gray-500 mt-1">Current Profile Picture</p>
                        </div>
                    @endif

                    <!-- File Input -->
                    <input type="file" name="teacher_profile" id="teacher_profile" accept="image/*"
                        class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400">

                    @error('teacher_profile')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Teacher Name -->
                <div>
                    <label for="name" class="block text-gray-700 font-medium">Teacher Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                        value="{{ old('name', $teacher->name) }}" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Age -->
                <div>
                    <label for="age" class="block text-gray-700 font-medium">Age</label>
                    <input type="number" id="age" name="age"
                        class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                        value="{{ old('age', $teacher->age) }}" required>
                    @error('age')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-gray-700 font-medium">Address</label>
                    <input type="text" id="address" name="address"
                        class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                        value="{{ old('address', $teacher->address) }}" required>
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <button type="submit"
                        class="w-full sm:w-auto flex-1 bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                        Update Teacher
                    </button>
                    <a href="{{ url('/teachers/index') }}"
                        class="w-full sm:w-auto flex-1 text-center bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                        Go Back
                    </a>
                </div>
            </form>
    </div>
</body>

</html>
