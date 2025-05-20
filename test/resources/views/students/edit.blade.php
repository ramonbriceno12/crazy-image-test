@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Edit Student</h2>

    <form action="{{ route('students.update', $student) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" name="first_name" id="first_name"
                   value="{{ old('first_name', $student->first_name) }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('first_name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text" name="last_name" id="last_name"
                   value="{{ old('last_name', $student->last_name) }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('last_name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="address" id="address"
                   value="{{ old('address', $student->address) }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('address')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Student
            </button>

            <!-- Delete Button Form -->
            <form action="{{ route('students.destroy', $student) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this student?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Delete
                </button>
            </form>
        </div>
    </form>
</div>
@endsection
