<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SenatorialDistrictSeeder extends Seeder
{
    public function run()
    {
        // Truncate the table before seeding
        if ($this->db->table('senatorial_district')->truncate()) {
            // Load the spreadsheet file
            $spreadsheet = IOFactory::load(ROOTPATH . 'public/uploads/senatorial_district.xlsx'); // Path to uploaded file
            $sheet = $spreadsheet->getActiveSheet();

            // Get the highest row number and column letter referenced in the worksheet
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            // $senatorId = null;
            // $categoryCoordinate = null;
            // $state = null;
            // // Loop through each row of the sheet in turn
            // for ($row = 2; $row <= $highestRow; $row++) {
            //     // Read a row of data into an array
            //     $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE)[0];

            //     // If senator name is not empty, find the corresponding senator's ID

            //     if (!empty($rowData[2])) {
            //         $categoryCoordinate = $rowData[2];
            //     }

            //     if (!empty($rowData[3])) {
            //         $state = $rowData[3];
            //     }

            //     if (!empty($rowData[4])) {
            //         $senator = $this->db->table('senators')
            //             ->select('senatorId')
            //             ->where('name', strtolower(trim($rowData[4])))
            //             ->get()
            //             ->getRow();

            //         if ($senator) {
            //             $senatorId = $senator->senatorId;
            //         }
            //     } else if (empty($rowData[3]) && empty($rowData[2]) && empty($rowData[4])) {
            //         $senatorId = null;
            //     }

            //     // Insert data into the database
            //     $this->db->table('senatorial_district')->insert([
            //         'districtName' => !empty(strtolower(trim($rowData[1]))) ? strtolower(trim($rowData[1])) : null,
            //         'categoryCoordinate' => strtolower(trim($categoryCoordinate)),
            //         'state' => strtolower(trim($state)),
            //         'senatorId' => $senatorId, // Store the senator's ID instead of the name
            //     ]);
            // }


            // Initialize variables to hold the previous values
            $prevDistrictName = '';
            $prevCategoryCoordinate = '';
            $prevState = '';
            $prevSenatorName = '';

            // Loop through each row of the sheet in turn
            for ($row = 2; $row <= $highestRow; $row++) {
                // Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE)[0];

                // Use the previous value if the current cell is empty
                $districtName = !empty($rowData[1]) ? $rowData[1] : $prevDistrictName;
                $categoryCoordinate = !empty($rowData[2]) ? $rowData[2] : $prevCategoryCoordinate;
                $state = !empty($rowData[3]) ? $rowData[3] : $prevState;
                $senatorName = !empty($rowData[4]) ? $rowData[4] : $prevSenatorName;

                // Update the previous values for the next iteration
                $prevDistrictName = $districtName;
                $prevCategoryCoordinate = $categoryCoordinate;
                $prevState = $state;
                $prevSenatorName = $senatorName;

                // Default value for senator_id
                $senatorId = null;

                // If senator name is not empty, find the corresponding senator's ID
                if (!empty($senatorName)) {
                    $senator = $this->db->table('senators')
                        ->select('senatorId')
                        ->where('name', trim($senatorName))
                        ->get()
                        ->getRow();

                    if ($senator) {
                        $senatorId = $senator->senatorId;
                    }
                }

                // Insert data into the database
                $this->db->table('senatorial_district')->insert([
                    'districtName' => ucfirst(strtolower(trim($districtName))),
                    'categoryCoordinate' => ucfirst(strtolower(trim($categoryCoordinate))),
                    'state' => ucfirst(strtolower(trim($state))),
                    'senatorId' => $senatorId, // Store the senator's ID instead of the name
                ]);
            }
        }

    }
}
