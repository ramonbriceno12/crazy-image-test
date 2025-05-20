<?php

namespace App\Jobs;

use App\Models\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InsertEmployeeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $employee;

    public function __construct(array $employee)
    {
        $this->employee = $employee;
    }

    public function handle()
    {
        // Prevent duplicate insertion (e.g., by name + salary)
        $exists = Employee::where('name', $this->employee['employee_name'])
                          ->where('salary', $this->employee['employee_salary'])
                          ->exists();

        if (!$exists) {
            Employee::create([
                'name' => $this->employee['employee_name'],
                'age' => $this->employee['employee_age'],
                'salary' => $this->employee['employee_salary'],
                'profile_picture' => $this->employee['profile_image'] ?? null,
            ]);
        }
    }
}
