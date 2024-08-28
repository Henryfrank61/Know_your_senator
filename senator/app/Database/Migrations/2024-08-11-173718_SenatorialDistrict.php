<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SenatorialDistrict extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'districtName' => [
                'type'       => 'TEXT',
                'null' => true
            ],
            'categoryCoordinate' => [
                'type'       => 'TEXT',
                'null' => true
            ],
            'state' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'senatorId' => [
                'type' => 'INT',
                'null' => true
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('senatorial_district');
    }

    public function down()
    {
        $this->forge->dropTable('senatorial_district');
    }
}
