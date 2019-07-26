<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];
    public $calculated_salary;

    public function calculateSalary() {

        $rules = [
            'usesCompanyCar',
            'more2Children',
            'olderThan50',
        ];

        $tax = new Tax($this,$rules);

        $this->applyRules($rules);
    }


}
