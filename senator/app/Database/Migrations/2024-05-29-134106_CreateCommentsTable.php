<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'post_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'comment' => [
                'type' => 'TEXT',
            ],
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('post_id', 'posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
