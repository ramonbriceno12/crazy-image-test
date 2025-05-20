@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Employees</h1>

    @if($employees->count())
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2 text-left">Profile Picture</th>
                    <th class="border px-4 py-2 text-left">Name</th>
                    <th class="border px-4 py-2 text-left">Age</th>
                    <th class="border px-4 py-2 text-left">Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td class="border px-4 py-2">
                            @if($employee->profile_picture)
                                <img src="{{ asset('storage/' . $employee->profile_picture) }}" alt="Profile" class="h-12 w-12 rounded-full object-cover">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">{{ $employee->name }}</td>
                        <td class="border px-4 py-2">{{ $employee->age }}</td>
                        <td class="border px-4 py-2">${{ number_format($employee->salary, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $employees->links() }}
        </div>
    @else
        <p>No employees found.</p>
    @endif
</div>
@endsection
