<?php

namespace App\Controllers;

use App\Models\Hotel;
use App\Models\Hotelcont;
use App\Models\Users;

class Pages extends BaseController
{
    protected $user, $db, $hotel, $hotelcont;
    public function __construct()
    {
        $this->user = new Users();
        $this->hotel = new Hotel();
        $this->hotelcont = new Hotelcont();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data = [
            'title' => 'Home',
            'user' => $this->user->find(session()->get('user_id'))
        ];
        return view('pages/home', $data);
    }
    public function search()
    {
        $hotelName = $this->request->getVar('name');
        $hotelAlamat = $this->request->getVar('alamat');
        if ($hotelName != "" || $hotelAlamat != "") {
            $cari = $this->hotel->like('name', $hotelName)->like('alamat', $hotelAlamat);
        } else {
            $cari = $this->hotel;
        }
        $data = [
            'title' => 'Search',
            'user' => $this->user->find(session()->get('user_id')),
            'hotels' => $cari->paginate(8, 'hotel'),
            'pager' => $cari->pager,
            'db' => $this->db
        ];
        return view('pages/search', $data);
    }
    public function cart()
    {
        checklog();
        $data = [
            'title' => 'Cart',
            'user' => $this->user->find(session()->get('user_id')),
            'carts' => $this->db->table('hotel_cart')->getWhere([
                'user_id' => session()->get('user_id')
            ])->getResultArray(),
            'hotels' => $this->hotel->findAll(),
            'total_cart' => $this->hotel->getTotalCart(),
            'db' => $this->db
        ];
        return view('menu/cart', $data);
    }
    public function profile()
    {
        $user = $this->user->find(session()->get('user_id'));
        $image = $this->db->table('user_galery')->getWhere(['user_id' => session()->get('user_id')])->getResultArray();
        $data  = [
            'title' => 'Profile',
            'user' => $user,
            'image' => $image
        ];
        return view('menu/profile', $data);
    }
}
