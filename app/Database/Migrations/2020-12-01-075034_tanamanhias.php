<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tanamanhias extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'idTanaman' => [
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
			'namaTanaman' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'harga' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'deskripsi' => [
				'type' => 'VARCHAR',
				'constraint' => 1000,
			],
			'tips' => [
				'type' => 'VARCHAR',
				'constraint' => 1000,
			],
			'foto' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			]
		]);
		$this->forge->addKey('idTanaman', true);
		$this->forge->addForeignKey('idPenjual', 'user', 'id', 'cascade', 'cascade');
		$this->forge->createTable('tanamanhias');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('tanamanhias');
	}
}
