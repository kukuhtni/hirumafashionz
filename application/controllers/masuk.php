<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masuk extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        // $this->load->model('m_kategori');
        // $this->load->model('m_konfigurasi');
    }
    //Halaman Utama Website Hiruma
    public function index()
    {

        //Validasi
        $this->form_validation->set_rules(
            'email',
            'Email/Username',
            'required',
            array('required' => '%s harus diisi')
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            //Proses Ke Simple Login
            $this->simple_pelanggan->login($email, $password);
        }
        //End Validasi
        // $site       = $this->m_konfigurasi->listing();
        // $kategori   = $this->m_konfigurasi->nav_produk();
        // $produk     = $this->m_produk->home();
        $data = array(
            'title' => 'Login Pelanggan',
            'isi' => 'masuk/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //Logout
    public function logout()
    {
        //ambil fungsi logout di Simple_pelanggan yang sudah diset di autoload libraries
        $this->simple_pelanggan->logout();
    }
}
