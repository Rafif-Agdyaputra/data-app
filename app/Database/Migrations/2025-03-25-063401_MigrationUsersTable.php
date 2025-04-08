<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MigrationUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'email' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'gender' => ['type' => 'ENUM', 'constraint' => ['Male', 'Female']],
            'hobbies' => ['type' => 'VARCHAR', 'constraint' => 255],
            'country' => ['type' => 'VARCHAR', 'constraint' => 100],
            'status' => ['type' => 'BOOLEAN', 'default' => 1],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
