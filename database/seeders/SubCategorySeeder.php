<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SubCategoryDescription = [
            "Active Directory",
            "Shared Folder",
            "Data Backup/Restore/Transfer",
            "Email Hosting",
            "Email Request for Third Party Application & Access Request",
            "Licensed Application",
            "Non-licensed Application",
            "Laptop/PC",
            "Headset",
            "Keyboard & Mouse",
            "Mobile Devices",
            "VOIP Phone",
            "SAP",
            "WMS",
            "DCS",
            "ISMS",
            "XLITE",
            "JITSI",
            "Call Management System",
            "Firewall Sophos",
            "Antivirus (KAV and Sophos)",
            "CCTV Review",
            "Communicator",
            "Sophos VPN",
            "Hisense",
            "Devant",
            "ISMS",
            "Prodsys",
            "EPSYS",
            "Warehouse Sale System",
            "Barcode System",
            "FELCRS",
            "ITHELPDESK"
        ];

        $CategoryID = [1, 2, 2, 3, 3, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 8, 8, 8, 9, 10, 11, 11, 11, 11, 11, 11, 11, 11, 11];
        $isIncident = [0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
        $isRequest =  [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];

        for($x = 0; $x<count($SubCategoryDescription); $x++) {
            $s = new SubCategory;
            $s->SubCategoryDescription = $SubCategoryDescription[$x];
            $s->CategoryID = $CategoryID[$x];
            $s->isIncident = $isIncident[$x];
            $s->isRequest = $isRequest[$x];
            $s->save();
        }
    }
}
