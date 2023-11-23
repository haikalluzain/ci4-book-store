<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BasicInformation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'profession' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'post_code' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'division' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('basic_informations');
    }

    public function down()
    {
        $this->forge->dropTable('basic_informations');
    }
}
