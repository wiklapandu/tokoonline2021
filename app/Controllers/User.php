<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Userprivacy;
use App\Models\Users;

class User extends BaseController
{
	protected $db, $userModel, $privacyModel;
	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->userModel = new Users();
		$this->privacyModel = new Userprivacy();
	}
	public function setting()
	{
		$user = $this->userModel->find(session()->get('user_id'));
		$bool = $this->db->table('user_privacy')->getWhere(["user_id" => $user['id']])->getRowArray();
		if (!$bool) {
			$this->privacyModel->save([
				"user_id" => $user['id']
			]);
		}
		$data = [
			'title' => 'Setting',
			'user' => $user,
			'user_priv' => $this->db->table('user_privacy')->getWhere(['user_id' => $user['id']])->getRowArray(),
			'validation' => \Config\Services::validation()
		];
		return view('menu/setting', $data);
	}
	public function galery()
	{
		$validatation = [
			"gambar" => "uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]"
		];
		if (!$this->validate($validatation)) {
			return redirect()->to('/u/detail')->withInput();
		}
		$gambar = $this->request->getFile('gambar');
		$gambarName = $gambar->getName();
		$gambar->move('img/user/galery');
		$data = [
			"user_id" => session()->get('user_id'),
			"img" => $gambarName
		];
		$this->db->table('user_galery')->insert($data);
		return redirect()->to('/u/detail');
	}
	public function detail()
	{
		$validation = [
			"image" => 'is_image[image]|max_size[image,2048]',
			"number" => 'numeric'
		];
		if (!$this->validate($validation)) {
			return redirect()->to('/u/setting')->withInput();
		}
		$user = $this->userModel->find(session()->get('user_id'));
		$user_privat = $this->db->table('user_privacy')->getWhere(['user_id' => $user['id']])->getRowArray();
		$number = ($this->request->getPost('number')) ? $this->request->getPost('number') : $user_privat['number'];
		$username = ($this->request->getPost('username')) ? $this->request->getPost('username') : $user['name'];
		$image = $this->request->getFile('image');
		if ($image->getError() == 4) {
			$imgName = $user['img'];
		} else {
			$imgName = $image->getName();
			if ($user['img'] != "default.jpg") {
				unlink('img/user/profile/' . $user['img']);
			}
			$image->move('img/user/profile');
		}
		$dataPub = [
			'id' => $user['id'],
			'name' => $username,
			'img' => $imgName
		];
		$this->userModel->save($dataPub);
		$dataPriv = [
			'id' => $user_privat['id'],
			'nomor' => $number,
			'BCA' => $this->request->getPost('BCA'),
			'VISA' => $this->request->getPost('VISA')
		];
		$this->privacyModel->save($dataPriv);
		session()->setFlashdata('message', '<div class="alert alert-success" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> Success!,</strong> Berhasil diupdate</div>');
		return redirect()->to('/u/setting');
	}
	public function delgalery()
	{
		$gambar = $this->db->table('user_galery')->getWhere([
			'user_id' => session()->get('user_id')
		])->getRowArray();
		unlink('img/user/galery/' . $gambar['img']);
		$delete = $this->db->table('user_galery')->delete([
			'id' => $this->request->getPost('idgambar'),
			'user_id' => session()->get('user_id')
		]);
		if ($delete) {
			session()->setFlashdata('message', '<div class="alert alert-success" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> Success!,</strong> Gambar berhasil dihapus</div>');
			return redirect()->to('/u/detail');
		} else {
			session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> Error!,</strong> Galery gagal dihapus</div>');
			return redirect()->to('/u/detail');
		}
	}
}
