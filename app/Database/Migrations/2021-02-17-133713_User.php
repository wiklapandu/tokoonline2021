<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'=>[
				'type'			=>'INT',
				'constraint'	=> 128,
				'unsigned'		=>true,
				'auto_increment'=> true
			],
			'name'=>[
				'type'			=> 'VARCHAR',
				'constraint'	=>	128
			],
			'password'=>[
				'type'			=> 'VARCHAR',
				'constraint'	=>	128
			],
			'img'=>[
				'type'			=> 'VARCHAR',
				'constraint'	=>	128
			],
			'is_active'=>[
				'type'			=> 'INT',
				'constraint'	=>	1
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user');
	}

	public function down()
	{
		//
		$this->forge->dropTable('user');
	}
}
