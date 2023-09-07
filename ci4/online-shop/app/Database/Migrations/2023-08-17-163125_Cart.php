<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cart extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type' => 'INT',
            ],
            'id_user' => [
                'type' => 'INT'
            ],
            'harga_produk' => [
                'type' => 'INT'
            ],
            'qty' => [
                'type' => 'INT'
            ],
            'subtotal' => [
                'type' => 'INT'
            ],
        ]);
        $this->forge->addForeignKey('id_produk', 'produk', 'id_produk');
        $this->forge->addForeignKey('id_user', 'users', 'users');
        $this->forge->createTable('cart');
    }

    public function down()
    {
        $this->forge->dropTable('cart');
    }
}
