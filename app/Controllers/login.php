<?php

namespace App\Controllers;

use App\Models\m_login;

class login extends BaseController
{
	protected $m_login;
	public function __construct()
	{
		$this->m_login = new m_login();
	}
	public function index()
	{
		return view('login/index');
	}

	public function log()
	{
		$username 	= $this->request->getPost('212395_Id');
		$password 	= $this->request->getPost('212395_pass');

		$cek_admin = $this->m_login->auth_admin($username, $password);
		var_dump($username, $password);
		if ($cek_admin) {
			session()->set('log', true);
			// session()->set('akses', '2');
			session()->set('username', $cek_admin['212395_Id']);
			session()->set('password', $cek_admin['212395_pass']);
			// session()->setFlashdata('pesan', 'Selamat Datang', $username);
			return redirect()->to('/admin');
		} else {  // jika username dan password tidak ditemukan atau salah
			session()->setFlashdata('gagal', 'Login Gagal');
			session()->setFlashdata('salah', 'Username atau Password salah ');
			return redirect()->to('/login');
		}
	}

	public function logout()
	{
		session()->remove('log');
		session()->remove('212395_Id');
		session()->remove('212395_pass');
		return redirect()->to('/login');
	}
}
