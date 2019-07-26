<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    const COUNTRY_TAX = 0.20;
    const MAX_AGE = 50;
    const MAX_CHILDREN = 2;
    public $rules;
    public $employee;

    public function __construct(Employee $employee, array $rules = [])
    {
        $this->employee = $employee;
        $this->rules = $rules;
    }

    public function calculate() {

        $this->employee->calculated_salary = $this->employee->calculated_salary ?? $this->employee->salary;
        $this->employee->calculated_salary = $this->employee->salary - ($this->employee->salary * self::COUNTRY_TAX);

        foreach ($this->rules as $rule) {

            if (method_exists($this, $rule)) {
                $this->employee->calculated_salary = $this->$rule($this->employee);
            }
        }
        echo sprintf('Name %s '. "\t" .' Default Salary: %s$' . "\t" .' Calculated Salary: %s$' . "\n", $this->employee->name, $this->employee->salary, $this->employee->calculated_salary);
    }

    public function usesCompanyCar() {
        if ($this->employee->usesCompanyCar) {
            return $this->employee->calculated_salary - 500;
        } else {
            return $this->employee->calculated_salary;
        }
    }

    public function more2Children() {
        if ($this->employee->children > 2) {
            return $this->employee->calculated_salary + (self::COUNTRY_TAX - 0.18) * $this->employee->salary;
        } else {
            return $this->employee->calculated_salary;
        }
    }

    public function olderThan50() {
        if ($this->employee->age > self::MAX_AGE) {
            return $this->employee->calculated_salary + (0.07 * $this->employee->salary);
        } else {
            return $this->employee->calculated_salary;
        }
    }

}
