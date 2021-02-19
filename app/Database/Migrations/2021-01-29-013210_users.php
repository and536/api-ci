<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
				'auto_increment' => true,
				'unsigned' => true,
				'constraint' => 10
			],
            'nome' => [
				'type' => 'VARCHAR',
				'constraint' => 150
			],
            'email' => [
				'type' => 'VARCHAR',
				'constraint' => 150
			],
            'senha' => [
				'type' => 'VARCHAR',
				'constraint' => 150
			],
			'createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
			'updatedAt TIMESTAMP DEFAULT "0000-00-00 00:00:00"'
		]);
		
		$this->forge->addKey('id', true);
        $this->forge->createTable('usuarios');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('usuarios');
	}
}
