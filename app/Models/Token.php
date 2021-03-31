<?php

namespace App\Models;

use CodeIgniter\Model;

class Token extends Model
{
	protected $table                = 'user_token';
	protected $allowedFields        = ['email', 'token'];
}
