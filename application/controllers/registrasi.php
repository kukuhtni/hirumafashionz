<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
    }
    //Halaman Belanja Website Hiruma
    public function index()
    {
        // $keranjang = $this->cart->contents();
        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_pelanggan',
            'Nama lengkap',
            'required',
            array('required'    => '%s harus diisi')
        );
        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[tb_pelanggan.email]',
            array(
                'required'    => '%s harus diisi',
                'valid_email' => '%s tidak valid',
                'is_unique'   => '%s sudah terdaftar!'
            )
        );
        $valid->set_rules(
            'password',
            'Password',
            'required',
            array('required'    => '%s harus diisi')
        );


        if ($valid->run() === FALSE) {
            //End Validasi Bro

            $data = array(
                'title'         => 'Registrasi Pelanggan',
                //'keranjang'     => $keranjang,
                'isi'           => 'registrasi/list'
            );
            $this->load->view('layout/wrapper', $data, FALSE);

            //Masuk Databasenya Bro
        } else {
            $i = $this->input;
            $data = array(
                'status_pelanggan'      => 'Pending',
                'nama_pelanggan'        => $i->post('nama_pelanggan'),
                'email'                 => $i->post('email'),
                'password'              => SHA1($i->post('password')),
                'telephone'             => $i->post('telephone'),
                'alamat'                => $i->post('alamat'),
                'tanggal_daftar'         => date('Y-m-d H:i:s')
            );
            $this->m_pelanggan->tambah($data);
            //Create session login pelanggan
            $this->session->set_userdata('email', $i->post('email'));
            $this->session->set_userdata('nama_pelanggan', $i->post('nama_pelanggan'));
            // if ($this->form_validation->run()) {
            //     $email = $this->input->post('email');
            //     $password = $this->input->post('password');
            //     //Proses Ke Simple Login
            //     $this->simple_pelanggan->login($email, $password);
            // }
            //End create seasson

            $this->session->set_flashdata('sukses', 'Selamat Registrasi Anda Berhasil! :)');
            redirect(base_url('registrasi/sukses'), 'refresh');
        }
        //End Masuk Database Bro!
    }

    //Sukses
    public function sukses()
    {
        $data = array(
            'title'        => 'Selamat Registrasi Anda Telah Berhasil :)',
            'isi'         => 'registrasi/sukses'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
