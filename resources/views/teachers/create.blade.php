<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create Teacher Profile</title>
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
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Create Teacher Profile</h2>

        <!-- ✅ Success & Error Messages -->
        <div class="absolute top-6 right-10">
            @include('components.flash-message')
        </div>

        <form action="{{ route('teachers.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="name" class="block text-gray-700 font-medium">Teacher Name</label>
                <input type="text" name="name"
                    class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                    value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="age" class="block text-gray-700 font-medium">Age</label>
                <input type="number" name="age"
                    class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                    value="{{ old('age') }}" required>
                @error('age')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="address" class="block text-gray-700 font-medium">Address</label>
                <input type="text" name="address"
                    class="w-full p-3 mt-1 bg-gray-100 text-gray-800 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-400"
                    value="{{ old('address') }}" required>
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="school_class_id" class="block text-sm font-medium text-gray-700 mb-2">Select Classes</label>
                <select
                    id="school_class_id"
                    name="school_class_id[]"
                    multiple
                    class="w-full px-4 py-2 border  rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm @error('school_class_id') border-red-500 @enderror hover:bg-blue-50 transition-colors duration-300 ease-in-out"
                    size="5"
                >
                    @foreach ($schoolClasses as $id => $className)
                        <option value="{{ $id }}"
                            {{ in_array($id, old('school_class_id', isset($teacher) ? $teacher->schoolClasses->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
                            {{ $className }}
                        </option>
                    @endforeach
                </select>
            
                @error('school_class_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>             

            <div class="flex flex-col sm:flex-row gap-3">
                <button type="submit"
                    class="w-full sm:w-auto flex-1 bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                    Submit
                </button>
                <a href="{{ url('/') }}"
                    class="w-full sm:w-auto flex-1 text-center bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                    Go Back
                </a>
            </div>
        </form>
    </div>
</body>

</html>
