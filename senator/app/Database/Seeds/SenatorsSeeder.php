<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SenatorsSeeder extends Seeder
{
    public function run()
    {
        // Load the spreadsheet file
        $spreadsheet = IOFactory::load(ROOTPATH . 'public/uploads/senators.xlsx');
        $sheet = $spreadsheet->getActiveSheet();

        // Get the highest row number and column letter referenced in the worksheet
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        // Loop through each row of the sheet in turn
        for ($row = 2; $row <= $highestRow; $row++) {
            // Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE)[0];

            // Handle the date_of_birth conversion
            $dateOfBirth = null;
            if (!empty($rowData[3])) {
                if (is_numeric($rowData[3])) {
                    // Convert Excel serial date to PHP date
                    $dateOfBirth = date('Y-m-d', \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($rowData[3]));
                } else {
                    // If it's already in date format, keep as is
                    $dateOfBirth = date('Y-m-d', strtotime($rowData[3]));
                }
            }

            // Insert data into the database
            $this->db->table('senators')->insert([
                'name' => ucfirst(strtolower(trim($rowData[1]))),
                'image' => $rowData[1] . '.jpg',
                //   'senatorial_district' => $rowData[2],
                'date_of_birth' => $dateOfBirth,
                'party' => ucfirst(strtolower(trim($rowData[4]))),
                'previous_offices' => ucfirst(strtolower(trim($rowData[5]))),
                'educational_background' => ucfirst(strtolower(trim($rowData[6]))),
                'phone_number' => ucfirst(strtolower(trim($rowData[7]))),
                'email' => ucfirst(strtolower(trim($rowData[8]))),
                'parliament_address' => ucfirst(strtolower(trim($rowData[9]))),
                'parliament_number' => ucfirst(strtolower(trim($rowData[10]))),
                'address' => ucfirst(strtolower(trim($rowData[11]))),
            ]);
        }
    }
}
