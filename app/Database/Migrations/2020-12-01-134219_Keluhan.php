<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keluhan extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'idKeluhan' => [
				'type' => 'INT',
				'constraint' => 255,
				'unsinged' => true,
				'auto_increment' => true,
			],
			'idPenjual' => [
				'type' => 'INT',
				'constraint' => 255,
				'unsinged' => true,
			],
			'idPembeli' => [
				'type' => 'INT',
				'constraint' => 255,
				'unsinged' => true,
			],
			'keluhan' => [
				'type' => 'VARCHAR',
				'constraint' => 1000,
			],
			'bukti' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'status' => [
				'type' => 'BOOLEAN',
			]
		]);
		$this->forge->addKey('idKeluhan', true);
		$this->forge->addForeignKey('idPenjual', 'user', 'id', 'cascade', 'cascade');
		$this->forge->addForeignKey('idPembeli', 'user', 'id', 'cascade', 'cascade');
		$this->forge->createTable('keluhan');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('keluhan');
	}
}
