<?php

namespace App\Models;

use CodeIgniter\Model;

class Hotelcont extends Model
{
	protected $table                = "hotelt JOIN hotel_contact ON hotel_contact.hotel_id  = hotel.id";
	protected $allowedFields        = ['hotel_id', 'alamat', 'email'];
	public function getJoinHotel()
	{
		return $this->db->table($this->table)->join($this->table, 'hotel.id = hotel_contact.hotel_id')->like('', '')->orLike('');
	}
}
