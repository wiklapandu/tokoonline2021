<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Hotel as hotels;
use App\Models\HotelCart;
use App\Models\Users;

class Hotel extends BaseController
{
	protected $user, $db, $cart, $hotel;
	public function __construct()
	{
		$this->user = new Users();
		$this->db = \Config\Database::connect();
		$this->cart = new HotelCart();
		$this->hotel = new hotels();
	}
	public function cart()
	{
		//
		checklog('/search');
		$user = $this->user->find(session()->get('user_id'));
		$hotel_id = $this->request->getPost('addCart');
		$userId = $user['id'];
		$cart = $this->db->table('hotel_cart')->getWhere([
			'hotel_id' => $hotel_id,
			'user_id' => $userId
		])->getRowArray();
		if ($cart) {
			$jumlah = $cart['jumlah'] + 1;
			$data = [
				'id' => $cart['id'],
				'hotel_id' => $hotel_id,
				'user_id' => $userId,
				'jumlah' => $jumlah
			];
			$this->cart->save($data);
			$hotel = $this->db->table('hotel')->getWhere(['id' => $hotel_id])->getRowArray();
			session()->setFlashdata('hotel', '<div class="alert alert-success top-50 alert-dismissible fade show" role="alert"><strong>Success!,</strong>berhasil memesan ' . $jumlah . ' tiket hotel ' . $hotel['name'] . '.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
			return redirect()->to('/search');
		}
		$data = [
			'hotel_id' => $hotel_id,
			'user_id' => $userId,
			'jumlah' => 1
		];
		$this->cart->save($data);
		$hotel = $this->db->table('hotel')->getWhere(['id' => $hotel_id])->getRowArray();
		session()->setFlashdata('hotel', '<div class="alert alert-success top-50 alert-dismissible fade show" role="alert"><strong>Success!,</strong> pesanan sudah memesan ' . $data['jumlah'] . ' tiket ' . $hotel['name'] . '.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
		return redirect()->to('/search');
	}
	public function deletecart()
	{
		$hotel_id = $this->request->getPost('deleteCart');
		$this->db->table('hotel_cart')->delete([
			'hotel_id' => $hotel_id,
			'user_id' => session()->get('user_id')
		]);
		session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> Success!,</strong> Berhasil dihapus dari keranjang</div>');
		return redirect()->to('/u/cart');
	}
	public function setcart(string $tipe)
	{
		if ($tipe == 'plus') {
			$hotel_id = $this->request->getPost('plusCart');
			$hotel = $this->hotel->getHotel($hotel_id);
			$this->db->table('hotel_cart')->update([
				'jumlah' => $hotel['jumlah'] + 1
			], [
				'hotel_id' => $hotel_id,
				'user_id' => session()->get('user_id')
			]);
		} elseif ($tipe == 'minus') {
			$hotel_id = $this->request->getPost('minusCart');
			$hotel = $this->hotel->getHotel($hotel_id);
			if ($hotel['jumlah'] != 1) {
				$this->db->table('hotel_cart')->update([
					'jumlah' => $hotel['jumlah'] - 1
				], [
					'hotel_id' => $hotel_id,
					'user_id' => session()->get('user_id')
				]);
			} else {
				session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert"><strong><i class="fas fa-fw fa-exclamation-triangle"></i> Error!,</strong> Jumlah tidak boleh kurang dari satu.</div>');
			}
		}
		return redirect()->to('/u/cart');
	}
}
