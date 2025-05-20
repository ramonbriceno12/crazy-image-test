<?php

namespace App\Console\Commands;

use App\Jobs\InsertEmployeeJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchEmployeeData extends Command
{
    protected $signature = 'fetch-data';
    protected $description = 'Fetch employee data from external API and dispatch job to queue';

    public function handle()
    {
        $response = Http::get('http://dummy.restapiexample.com/api/v1/employees');

        if ($response->successful()) {
            $employees = $response->json('data');

            foreach ($employees as $employee) {
                // Dispatch each employee to queue
                InsertEmployeeJob::dispatch($employee);
            }

            $this->info('Employee records dispatched to queue.');
        } else {
            $this->error('Failed to fetch data from API.');
        }
    }
}
