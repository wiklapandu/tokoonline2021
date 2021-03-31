<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
	protected $table                = 'user';
	protected $allowedFields        = ['name', 'email', 'password', 'img', 'is_active'];
}
