<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserToken extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'=>[
				'type'				=>		'INT',
				'constraint'		=> 		128,
				'unsigned'			=>		true,
				'auto_increment'	=> 		true,
			],
			'user_id'=>[
				'type'				=>		'INT',
				'constraint'		=>		128,
			],
			'token'=>[
				'type'				=>		'VARCHAR',
				'constraint'		=>		128,
			]
		]);
		$this->forge->addKey('id',true);
		$this->forge->createTable('user_token');
	}

	public function down()
	{
		//
		$this->forge->dropTable('user_token');
	}
}
