<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Senators extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'senatorId' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'image' => [
                'type'       => 'TEXT',
                'null' => true
            ],
            'name' => [
                'type'       => 'TEXT',
                'null' => false
            ],
            'date_of_birth' => [
                'type'       => 'TEXT',
                'null' => true
            ],
            'party' => [
                'type'       => 'TEXT',
                'null' => true
            ],
            'previous_offices' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'educational_background' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'phone_number' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'email' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'parliament_address' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'parliament_number' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('senatorId', true);
        $this->forge->createTable('senators');
    }

    public function down()
    {
        $this->forge->dropTable('senators');
    }
}
