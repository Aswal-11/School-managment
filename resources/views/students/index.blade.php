<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white min-h-screen flex flex-col items-center p-5">

    <div class="w-full max-w-4xl bg-gray-800 shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-2xl font-bold text-white">Students List</h3>
            {{-- It will display the messages --}}
            @include('components.flash-message')

            <a href="{{ url('/') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition">Go Back</a>
        </div>
        <form method="GET" action="{{ route('students.index') }}" class="w-full flex flex-col md:flex-row items-center gap-2 mb-4">
            <input type="text" name="search" value="{{ old('search', $search ?? '') }}" placeholder="Search by name, email, roll no"
                class="w-full  px-4 py-2 rounded-lg text-black focus:outline-none" />
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Search</button>
            <a href="{{ route('students.index', ['reset' => true]) }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Reset</a>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-700 text-center">
                <thead class="bg-gray-700 text-white">
                    <tr>
                        <th class="border border-gray-600 px-4 py-2">ID</th>
                        <th class="border border-gray-600 px-4 py-2">Name</th>
                        <th class="border border-gray-600 px-4 py-2">Age</th>
                        <th class="border border-gray-600 px-4 py-2">Address</th>
                        <th class="border border-gray-600 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-900">
                    @foreach ($students as $student)
                    <tr class="hover:bg-gray-700 transition">
                        <td class="border border-gray-600 px-4 py-2">{{ $student->id }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $student->name }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $student->age }}</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $student->address }}</td>
                        <td class="border border-gray-600 px-4 py-2 flex justify-center gap-2">
                            <!-- Edit Button -->
                            <a href="{{ route('students.edit', $student->id) }}" class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition">
                                Edit
                            </a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')  <!-- This tells Laravel to handle it as a DELETE request -->
                                <button type="submit" class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex justify-center">
            {{ $students->links('pagination::tailwind') }}
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this student?");
        }
    </script>

</body>
</html>
