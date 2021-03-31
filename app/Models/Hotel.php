<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotel extends Model
{
	protected $table                = 'hotel';
	protected $allowedFields        = ['name', 'slug', 'thumbnail', 'harga', 'rating'];
	public function getHotel($hotel_id)
	{
		return $this->db->table('hotel_cart')->getWhere([
			'hotel_id' => $hotel_id,
			'user_id' => session()->get('user_id')
		])->getRowArray();
	}
	public function getTotalCart()
	{
		$user_id = session()->get('user_id');
		// mendapatkan total pada keranjang
		$query = "SELECT SUM(`harga`*`jumlah`) FROM `hotel_cart`
            JOIN `hotel` ON `hotel`.`id` = `hotel_cart`.`hotel_id`
            WHERE `hotel_cart`.`user_id`= $user_id
            ";
		return $this->db->query($query)->getRowArray()["SUM(`harga`*`jumlah`)"];
	}
}
