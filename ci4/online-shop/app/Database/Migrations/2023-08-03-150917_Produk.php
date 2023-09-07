<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {


        $this->forge->addField([
            'id_produk' => [
                'type' => 'INT',
                'constraint' => 18,
                'auto_increment' => true,
            ],
            'nama_produk' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'desk' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'spek' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'ukuran' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true,
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 18,
            ],
        ]);

        $this->forge->addPrimaryKey('id_produk');
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
