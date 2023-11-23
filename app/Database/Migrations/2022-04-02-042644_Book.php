<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Book extends Migration
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
            'genre_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'author_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'publisher_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'description' => [
                'type' => 'TEXT'
            ],
            'cover' => [
                'type' => 'TEXT'
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'total_pages' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'release_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'language' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
                'default' => 'Indonesia'
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11
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
        $this->forge->addForeignKey('genre_id', 'genres', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('author_id', 'authors', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('publisher_id', 'publishers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('updated_by', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
