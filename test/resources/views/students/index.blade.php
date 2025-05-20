@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Students</h2>
        <a href="{{ route('students.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Add Student</a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">First Name</th>
                <th class="border px-4 py-2">Last Name</th>
                <th class="border px-4 py-2">Address</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td class="border px-4 py-2">{{ $student->id }}</td>
                    <td class="border px-4 py-2">{{ $student->first_name }}</td>
                    <td class="border px-4 py-2">{{ $student->last_name }}</td>
                    <td class="border px-4 py-2">{{ $student->address }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{ route('students.edit', $student) }}" class="text-blue-500">Edit</a>
                        <!-- <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500" onclick="return confirm('Delete this student?')">Delete</button>
                        </form> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $students->links() }}
    </div>
</div>
@endsection
