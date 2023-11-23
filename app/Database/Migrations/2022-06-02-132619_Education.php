<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Education extends Migration
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
            'degree' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'institute' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'year' => [
                'type' => 'INTEGER',
                'constraint' => 10,
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
        $this->forge->createTable('education');
    }

    public function down()
    {
        $this->forge->dropTable('education');
    }
}
