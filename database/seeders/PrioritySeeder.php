<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Priority;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Priority = ['Incident P1 (1 hour)', 'Incident P2 (2 hours)', 'Incident P4 (24 Hours)', 'Incident P3 (6 hours)', 
        'Incident P5 (48 Hours)', 'Request Sev 1 (24 hours)', 'Request Sev 2 (48 hours)', 'Request Sev 3 (72 hours)', 
        'Request Sev 4 (2 weeks)', 'Request Sev 5 (30-60 days)', 'TBD'];

        $RequestType = ['Incident', 'Incident', 'Incident', 'Incident', 'Incident', 'Request', 'Request', 'Request', 'Request', 'Request', 'Incident/Request'];

        for($x = 0; $x<count($Priority); $x++) {
            $prio = new Priority;
            $prio->PriorityDescription = $Priority[$x];
            $prio->RequestType = $RequestType[$x];
            $prio->save();
        }
    }
}
