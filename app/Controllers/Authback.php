<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Token;
use App\Models\Users;

class Authback extends BaseController
{
	protected $user, $token, $db;
	public function __construct()
	{
		$this->token = new Token();
		$this->db = \Config\Database::connect();
		$this->user = new Users();
	}
	public function verify()
	{
		$email = $this->request->getVar('em');
		$token = $this->request->getVar('tn');
		$user = $this->db->table('user')->getWhere([
			'email' 	=> $email
		])->getRowArray();
		if ($user) {
			$user = $this->db->table('user')->getWhere([
				'email' 	=> $email,
				'is_active' => 0
			])->getRowArray();
			if ($user) {
				$user_token = $this->db->table('user_token')->getWhere([
					'email' => $email,
					'token' => $token
				])->getRowArray();
				if ($user_token) {
					$this->db->table('user')->update(['is_active' => 1], ['email' => $email]);
					$this->db->table('user_token')->delete(['email' => $email]);
					session()->setFlashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diaktifkan</div>');
					return redirect()->to('/login');
				}
				// Make Flashdata Key message
				session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> Error!,</strong> Token salah</div>');
				return redirect()->to('/login');
			}
			session()->setFlashdata('message', '<div class="alert alert-warning" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> Error!,</strong> Email sudah diaktifkan</div>');
			return redirect()->to('/login');
		} else {
			// Make Flashdata Key message
			session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> Alert!,</strong> Email tidak diketahui</div>');
			return redirect()->to('/login');
		}
	}
	public function login()
	{
		$validation = [
			'email' => [
				'rules' => 'required|valid_email'
			],
			'password' => [
				'rules' => 'required|min_length[8]'
			]
		];
		if (!$this->validate($validation)) {
			return redirect()->to('/login')->withInput();
		}
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		$user = $this->db->table('user')->getWhere([
			'email' => $email
		])->getRowArray();
		if ($user) {
			$user = $this->db->table('user')->getWhere([
				'email' => $email, 'is_active' => 1
			])->getRowArray();
			if ($user) {
				if (password_verify($password, $user['password'])) {
					session()->set('user_id', $user['id']);
					session()->set('email', $user['email']);
					return redirect()->to('/');
				}
				session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> alert!</strong>, Password salah</div>');
				return redirect()->to('/login')->withInput();
			}
			session()->setFlashdata('message', '<div class="alert alert-warning" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> alert!</strong>, Akun belum diaktif</div>');
			return redirect()->to('/login')->withInput();
		}
		session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> alert!</strong>, Akun tidak terdaftar</div>');
		return redirect()->to('/login')->withInput();
	}
	public function registrasi()
	{
		// backend registrasi
		$validation = [
			'name' => [
				'rules' => 'required|max_length[20]'
			],
			'email' => [
				'rules' => 'required|valid_email|is_unique[user.email]'
			],
			'password' => [
				'rules' => 'required|min_length[8]|matches[Repassword]'
			],
			'Repassword' => [
				'rules' => 'required|min_length[8]|matches[password]'
			]
		];
		if (!$this->validate($validation)) {
			return redirect()->to('/registrasi')->withInput();
		}
		$password = $this->request->getPost('password');
		// data regis
		$email = $this->request->getPost('email');
		$regis = [
			'name' 		=> $this->request->getPost('name'),
			'email' 	=> $email,
			'password'	=> password_hash($password, PASSWORD_DEFAULT),
			'img' 		=> 'default.jpg',
			'is_active' => 0
		];
		// INSERT USER
		$this->user->save($regis);
		$token = base64_encode(random_bytes(32));
		$tokens = [
			'email' => $email,
			'token' => $token
		];
		// INSERT TOKEN
		$this->token->save($tokens);
		// Send Email from private _sendEmail tipe verify parameter $token
		$this->_sendEmail('verify', $token);
		// Make Flashdata Key Message
		session()->setFlashdata('message', '<div class="alert alert-success" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> Alert!,</strong> Email verifikasi telah dikirim</div>');
		return redirect()->to('/registrasi');
	}
	private function _sendEmail($type, $token)
	{
		$email = \Config\Services::email();
		$email->setFrom('wiklaoffice@gmail.com', 'Traveler');
		$getEmail = $this->request->getPost('email');
		$email->setTo($getEmail);
		if ($type == 'verify') {
			$email->setSubject('Verify Account | Traveler');
			$email->setMessage('
			<p>Ini adalah email aktifasi akun anda di <a href="' . base_url() . '">Traveler</a>.</p>
			<p>Untuk mengaktifasi akun anda gunakan URL ini.</p>
			<p><a href="' . base_url('/verify?em=') . $getEmail . '&tn=' . urlencode($token) . '">Activate account.</a></p>
			<br><br><br>
			<p>Jika anda tidak mendaftar di website ini, anda bisa acuhkan email ini.</p>
			');
		} elseif ($type == 'forgot') {
			$email->setSubject('Email Test');
			$email->setMessage('Testing the email class.');
		} elseif ($type == 'changepass') {
			$email->setSubject('Email Test');
			$email->setMessage('Testing the email class.');
		}
		if (!$email->send()) {
			echo 'error email can\'t been send';
			die;
		}
	}
}
