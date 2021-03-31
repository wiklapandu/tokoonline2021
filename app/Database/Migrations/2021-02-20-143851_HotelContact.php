<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HotelContact extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true,
				'constraint' => 128
			],
			'hotel_id' => [
				'type' => 'INT',
				'constraint' => 128
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('hotel_contact');
	}

	public function down()
	{
		//
		$this->forge->dropTable('hotel_contact');
	}
}
