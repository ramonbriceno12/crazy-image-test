@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h2 class="text-xl font-bold mb-4">Add Student</h2>

    <form action="{{ route('students.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>First Name</label>
            <input name="first_name" required class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label>Last Name</label>
            <input name="last_name" class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label>Address</label>
            <input name="address" class="w-full border rounded px-3 py-2">
        </div>

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
    </form>
</div>
@endsection
