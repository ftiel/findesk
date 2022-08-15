<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Department = ['SALES', 'LOGISTICS', 'PROCUREMENT', 'MARKETING', 'ACCOUNTING', 'DEMAND PLANNING', 'ADMIN', 'HUMAN RESOURCES', 'IT', 'AUDIT', 'EXECUTIVE', 'SERVICE', 'TREASURY', 'FINANCE', 'PRODUCT DEVELOPMENT', 'SUPPLY CHAIN', 'SERVICE', 'ASSEMBLY', 'EXECUTIVE'];

        for($x = 0; $x<count($Department); $x++) {
            $dept = new Department;
            $dept->DepartmentName = $Department[$x];
            $dept->save();
        }
    }
}