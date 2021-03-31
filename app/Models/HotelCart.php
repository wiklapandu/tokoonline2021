<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelCart extends Model
{
	protected $table                = 'hotel_cart';
	protected $allowedFields        = ['hotel_id', 'user_id', 'jumlah'];
}
