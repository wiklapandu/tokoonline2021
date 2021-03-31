<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
	public function index()
	{
		//
		if (session()->get('user_id')) {
			return redirect()->to('/');
		}
		$data = [
			'title' => 'Login',
			'validation' => \Config\Services::validation()
		];
		return view('auth/login', $data);
	}
	public function registrasi()
	{
		if (session()->get('user_id')) {
			return redirect()->to('/');
		}
		$data = [
			'title' => 'Registrasi',
			'validation' => \Config\Services::validation()
		];
		return view('auth/regis', $data);
	}
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/');
	}
}
