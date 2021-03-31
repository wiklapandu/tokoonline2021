<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usergaleri extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			"id" => [
				"type" 				=> "INT",
				"constraint" 		=> 128,
				"auto_increment" 	=> true,
				"unsigned" 			=> true
			],
			"user_id" => [
				"type" => "INT",
				"constraint" => 128
			],
			"img" => [
				"type" => "VARCHAR",
				"constraint" => 128
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable("user_galery");
	}

	public function down()
	{
		//
		$this->forge->dropTable("user_galery");
	}
}
