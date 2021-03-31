<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hotel extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id' => [
				'type' => "INT",
				'unsigned' => true,
				'constraint' => 128,
				'auto_increment' => true
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			],
			'thumbnail' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			],
			'harga' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			],
			'rating' => [
				'type' => 'INT',
				'constraint' => 1
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('hotel');
	}

	public function down()
	{
		//
		$this->forge->dropTable('hotel');
	}
}
