<?php

namespace App\Models;

use CodeIgniter\Model;

class Userprivacy extends Model
{
	protected $table                = 'user_privacy';
	protected $allowedFields        = ["user_id", "nomor", "BCA", "VISA"];
}
