<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\map;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 255,
				'unsinged' => true,
				'auto_increment' => true,
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'unique' => true,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'jenis_user' => [
				'type' => 'VARCHAR',
				'constraint' => 2,
			],
			'foto' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'default' => 'default.png',
			],
			'nohp' => [
				'type' => 'varchar',
				'constraint' => 10,
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
