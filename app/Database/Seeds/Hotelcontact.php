<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Hotelcontact extends Seeder
{
	public function run()
	{
		//
		$data = [
			'hotel_id' => 2,
			'alamat' => 'JL.Pramuka Geyer',
			'email' => 'hotelbaru@hotel.co.id'
		];
		$this->db->table('hotel_contact')->insert($data);
	}
}
