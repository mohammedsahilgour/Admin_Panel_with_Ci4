<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBlog extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'firstname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ], 
             'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ], 
             'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('form');
    }

    public function down()
    {
        $this->forge->dropTable('form');
    }
}