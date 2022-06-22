<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        //Load Data Model User
        $this->CI->load->model('m_user');
    }

    //Fungsi login
    public function login($username, $password)
    {
        $check = $this->CI->m_user->login($username, $password);
        //Jika ada data user, maka create session login
        if ($check) {
            $id_user        = $check->id_user;
            $nama           = $check->nama;
            $akses_level    = $check->akses_level;
            //Create Session
            $this->CI->session->set_userdata('id_user', $id_user);
            $this->CI->session->set_userdata('nama', $nama);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('akses_level', $akses_level);
            //Redirect Ke halaman admin yang diproteksi
            redirect(base_url('admin/dashboard'), 'refresh');
        } else {
            //Kalau Tidak Ada (Username Password Salah), Maka Suruh Login Lagi
            $this->CI->session->set_flashdata('warning', 'Username atau password salah');
            redirect(base_url('login'), 'refresh');
        }
    }

    //Fungsi Cek Login
    public function cek_login()
    {
        //Memeriksa apakah session sudah atau belum, jika belum alihkan ke halaman login
        if (
            $this->CI->session->userdata('username') == ""
        ) {
            $this->CI->session->set_flashdata('warning', 'Anda belum login bung!');
            redirect(base_url('login'), 'refresh');
        }
    }

    //Fungsi Logout
    public function logout()
    {
        //Membuang semua session yang telah diset pada login
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('akses_level');
        //Setelah session dibuang, maka diredirect/balik ke login
        $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout bung!');
        redirect(base_url('login'), 'refresh');
    }
}
