<?php

namespace App\Console\Commands;

use App\Employee;
use App\Tax;
use Illuminate\Console\Command;

class ShowSalaryForEmployees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate salary for employees';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $rules = [
            'usesCompanyCar',
            'more2Children',
            'olderThan50',
        ];

        $employees = Employee::all();

        $employees->each(function($employee) use ($rules) {

            $tax = new Tax($employee, $rules);
            $tax->calculate();
        });
    }
}
