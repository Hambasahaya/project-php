<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                "null" => false
            ],
            'nama_user' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'jk' => [
                'type'       => 'ENUM',
                'constraint' => ['Laki-Laki', 'Perempuan'],
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 225,
                'null' => false,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'no_tlp' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true
            ]
        ]);
        $this->forge->addPrimaryKey('id_user');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
