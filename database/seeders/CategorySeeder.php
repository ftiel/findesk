<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryName = [
            "ADMINISTRATION",
            "FILE SYSTEM",
            "MESSAGING",
            "APPLICATIONS",
            "DEVICES",
            "ONLINE PRODUCT SUITE",
            "SOFTPHONE",
            "SECURITY",
            "COLLABORATION",
            "REMOTE COMPUTING",
            "APP AND WEB DEVELOPMENT"
        ];
        $isIncident = [0, 0, 0, 1, 1, 1, 0, 1, 0, 1, 1];
        $isRequest  = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];

        for($x = 0; $x<count($categoryName); $x++) {
            $c = new Category;
            $c->CategoryDescription = $categoryName[$x];
            $c->isIncident = $isIncident[$x];
            $c->isRequest  = $isRequest[$x];
            $c->save();
        }
    }
}
