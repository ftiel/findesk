<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chart;

class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ChartName = ['Bar', 'Line', 'Radar', 'Doughnut', 'Pie', 'Polar Area'];
        $ChartType = ['bar', 'line', 'radar', 'doughtnut', 'pie', 'polarArea'];

        for($x = 0; $x<count($ChartName); $x++) {
            $chart = new Chart;
            $chart->ChartName = $ChartName[$x];
            $chart->ChartType = $ChartType[$x];
            $chart->save();
        }
    }
}
