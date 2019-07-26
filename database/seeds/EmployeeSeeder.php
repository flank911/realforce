<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'name' => 'Alice',
                'age' => 26,
                'children' => 2,
                'salary' => 6000,
                'usesCompanyCar' => false
            ],
            [
                'name' => 'Bob',
                'age' => 52,
                'children' => 0,
                'salary' => 4000,
                'usesCompanyCar' => true
            ],
            [
                'name' => 'Charlie',
                'age' => 36,
                'children' => 3,
                'salary' => 5000,
                'usesCompanyCar' => true
            ]
        ];

        foreach ($employees as $employee) {
            \App\Employee::create($employee);
        }

        /*factory(App\Page::class, 10)
            ->create();*/
    }
}
