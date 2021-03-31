<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cart extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'auto_increment' => true,
				'unsigned' => true,
				'constraint' => 128
			],
			'hotel_id' => [
				'type' => 'INT',
				'constraint' => 128
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => 128
			],
			'jumlah' => [
				'type' => 'INT',
				'constraint' => 128
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('hotel_cart');
	}

	public function down()
	{
		//
		$this->forge->dropTable('hotel_cart');
	}
}
