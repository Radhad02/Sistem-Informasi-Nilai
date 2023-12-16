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
		$username     = $this->request->getPost('212395_Username');
		$password     = $this->request->getPost('212395_Pass');
		$cek_admin    = $this->m_login->auth_admin($username, $password);
		if ($cek_admin) {
			if ($cek_admin['212395_Level'] == 'admin') {
				$nama = session()->set('nama', $cek_admin['212395_Nama']);
				session()->set('log', true);
				session()->set('idweh', $cek_admin['212395_Id']);
				session()->set('nama', $cek_admin['212395_Nama']);
				session()->set('level', $cek_admin['212395_Level']);
				session()->set('username', $cek_admin['212395_Username']);
				session()->set('password', $cek_admin['212395_Pass']);
				session()->setFlashdata('pesan', 'Selamat Datang', $nama);
				return redirect()->to('/admin');
			} else if ($cek_admin['212395_Level'] == 'dosen') {
				session()->set('log', true);
				session()->set('idweh', $cek_admin['212395_Id']);
				session()->set('nama', $cek_admin['212395_Nama']);
				session()->set('level', $cek_admin['212395_Level']);
				session()->set('username', $cek_admin['212395_Username']);
				session()->set('password', $cek_admin['212395_Pass']);
				session()->setFlashdata('pesan', 'Selamat Datang', $username);
				return redirect()->to('/nilai/Data_Nilai');
			} else if ($cek_admin['212395_Level'] == 'mahasiswa') {
				session()->set('log', true);
				session()->set('idweh', $cek_admin['212395_Id']);
				session()->set('nama', $cek_admin['212395_Nama']);
				session()->set('level', $cek_admin['212395_Level']);
				session()->set('username', $cek_admin['212395_Username']);
				session()->set('password', $cek_admin['212395_Pass']);
				session()->setFlashdata('pesan', 'Selamat Datang', $username);
				return redirect()->to('/nilai/nilaiMahasiswa');
			}
		} else {
			// Jika username dan password tidak ditemukan atau salah
			session()->setFlashdata('gagal', 'Login Gagal');
			session()->setFlashdata('salah', 'Username atau Password salah ');
			return redirect()->to('/login');
		}
	}
	public function logout()
	{
		session()->remove('log');
		session()->remove('212395_Username');
		session()->remove('212395_Pass');
		return redirect()->to('/login');
	}
}
