<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HouseOfReps extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'state' => [
                'type'       => 'TEXT',
                'null' => true
            ],
            'constituencies' => [
                'type'       => 'TEXT',
                'null' => true
            ],
            'repId' => [
                'type'       => 'INT',
                'null' => true
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('house_of_reps');
    }

    public function down()
    {
        $this->forge->dropTable('house_of_reps');
    }
}
