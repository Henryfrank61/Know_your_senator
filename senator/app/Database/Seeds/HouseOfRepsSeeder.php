<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class HouseOfRepsSeeder extends Seeder
{
    public function run()
    {
        // Load the spreadsheet file
        $spreadsheet = IOFactory::load(ROOTPATH . 'public/uploads/house_of_reps.xlsx'); // Path to uploaded file
        $sheet = $spreadsheet->getActiveSheet();

        // Get the highest row number and column letter referenced in the worksheet
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $state = null;
        $constituencies = null;
        // Loop through each row of the sheet in turn
        for ($row = 2; $row <= $highestRow; $row++) {

            // Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE)[0];

            // Default value for senator_id
            $repId = null;
            // If senator name is not empty, find the corresponding senator's ID
            if (!empty($rowData[3])) {
                $houseofreps = $this->db->table('honorables')
                    ->select('repId')
                    ->where('name', strtolower(trim($rowData[3])))
                    ->get()
                    ->getRow();

                if ($houseofreps) {
                    $repId = $houseofreps->repId;
                }
            }

            if (!empty($rowData[1])) {
                $state = $rowData[1];
            }

            if (!empty($rowData[2])) {
                $constituencies = $rowData[2];
            }

            // Insert data into the database
            $this->db->table('house_of_reps')->insert([
                'state' => ucfirst(strtolower(trim($state))),
                'constituencies' => ucfirst(strtolower(trim($constituencies))),
                'repId' => $repId, // Store the senator's ID instead of the name
            ]);

            if($rowData[0] == 434)
            {
                return;
            }
        }
    }
}
