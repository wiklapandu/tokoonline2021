<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Hotel extends Seeder
{
	public function run()
	{
		$faker = \Faker\Factory::create('id_ID');
		for ($i = 1; $i <= 50; $i++) :
			$lop = $i;
			$hotel = 'Uthopia ' . $lop;
			$data = [
				'name' => $hotel,
				'slug' => url_title($hotel, '-', true),
				'thumbnail' => ($lop % 2 == 0) ? 'hotel-uthopia.jpg' : 'hotel.jpg',
				'alamat' => $faker->address,
				'harga' => $lop . '00.000',
				'rating' => 5
			];
			$this->db->table('hotel')->insert($data);
			$contact = [
				'hotel_id' => $lop,
				'email' => $faker->email
			];
			$this->db->table('hotel_contact')->insert($contact);
		endfor;
	}
}
