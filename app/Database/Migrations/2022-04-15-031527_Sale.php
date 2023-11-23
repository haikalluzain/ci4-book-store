<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sale extends Migration
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
            'shipping_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'invoice_number' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'shipping_fee' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'total_price' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'status' => [
                'type' => 'ENUM("PENDING", "PAID", "ON_THE_WAY", "DELIVERED")',
                'default' => 'PENDING'
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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
        $this->forge->addForeignKey('shipping_id', 'shippings', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('updated_by', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sales');
    }

    public function down()
    {
        $this->forge->dropTable('sales');
    }
}
