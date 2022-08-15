<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Status = ['Unassigned', 'Open', 'Pending', 'Ongoing', 'Resolved', 'Cancelled'];

        for($x = 0; $x<count($Status); $x++) {
            $stat = new Status;
            $stat->StatusName = $Status[$x];
            $stat->save();
        }
    }
}
