<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_pelanggan
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        //Load Data Model Pelanggan
        $this->CI->load->model('m_pelanggan');
    }

    //Fungsi login
    public function login($email, $password)
    {
        $check = $this->CI->m_pelanggan->login($email, $password);
        //Jika ada data pelanggan, maka create session login
        if ($check) {
            $id_pelanggan           = $check->id_pelanggan;
            $nama_pelanggan         = $check->nama_pelanggan;
            // $akses_level            = $check->akses_level;
            //Create Session
            $this->CI->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->CI->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->CI->session->set_userdata('email', $email);
            // $this->CI->session->set_userdata('akses_level', $akses_level);
            //Redirect Ke halaman admin yang diproteksi
            redirect(base_url('dashboard'), 'refresh');
        } else {
            //Kalau Tidak Ada (Username Password Salah), Maka Suruh Login Lagi
            $this->CI->session->set_flashdata('warning', 'Username atau password salah');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    //Fungsi Cek Login
    public function cek_login()
    {
        //Memeriksa apakah session sudah atau belum, jika belum alihkan ke halaman login
        if (
            $this->CI->session->userdata('email') == ""
        ) {
            $this->CI->session->set_flashdata('warning', 'Anda belum login bung!');
            redirect(base_url('masuk'), 'refresh');
        }
    }

    //Fungsi Logout
    public function logout()
    {
        //Membuang semua session yang telah diset pada login
        $this->CI->session->unset_userdata('id_pelanggan');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('email');
        // $this->CI->session->unset_userdata('akses_level');
        //Setelah session dibuang, maka diredirect/balik ke login
        $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout bung!');
        redirect(base_url('masuk'), 'refresh');
    }
}
