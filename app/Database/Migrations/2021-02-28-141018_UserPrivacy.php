<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserPrivacy extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			"id" => [
				'type'				=> 'INT',
				'constraint'		=> 128,
				'unsigned'			=> true,
				'auto_increment'	=> true
			],
			"user_id" => [
				'type'			=> 'INT',
				'constraint'	=> 128
			],
			"nomor" => [
				'type'			=>	'VARCHAR',
				'constraint'	=> 15
			],
			"BCA" => [
				'type'			=> 'INT',
				'constraint'	=> 20
			],
			"VISA" => [
				'type'			=> 'INT',
				'constraint'	=> 20
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user_privacy');
	}

	public function down()
	{
		//
		$this->forge->dropTable('user_privacy');
	}
}
