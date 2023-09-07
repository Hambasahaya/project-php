<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusPesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_status' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'status_pesanan' => [
                'type' => 'ENUM',
                'constraint' => ['SELESAI', 'DIKEMAS', 'PROSES PENGRIMAN', 'BELUM SELESAI'],
            ]
        ]);
        $this->forge->addPrimaryKey('id_status');
        $this->forge->createTable('status_pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('status_pesanan');
    }
}
