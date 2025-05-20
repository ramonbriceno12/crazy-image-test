<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Show paginated list of employees
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    // Show create employee form
    public function create()
    {
        return view('employees.create');
    }

    // Store new employee
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'salary' => 'required|numeric|min:0',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'age', 'salary');

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employee created!');
    }

    // Show edit form
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    // Update employee
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'salary' => 'required|numeric|min:0',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $data = $request->only('name', 'age', 'salary');

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated!');
    }

    // Delete employee
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted!');
    }
}
