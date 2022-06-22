<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        //Proteksi halaman
        $this->simple_login->cek_login();
    }

    // Data User
    public function index()
    {
        $user = $this->m_user->listing();
        $data = array(
            'title' => 'Data Pengguna',
            'user' => $user,
            'isi' => 'admin/user/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    //Tambah User
    public function tambah()
    {
        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama',
            'Nama lengkap',
            'required',
            array('required'    => '%s harus diisi')
        );
        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required'    => '%s harus diisi',
                'valid_email' => '%s tidak valid'
            )
        );
        $valid->set_rules(
            'username',
            'Username',
            'required|min_length[6]|max_length[32]|is_unique[tb_users.username]',
            array(
                'required'    => '%s harus diisi',
                'min_length'  => '%s minimal 6 karakter',
                'max_length'  => '%s maksimal 32 karakter',
                'is_unique'  => '%s sudah ada. Buat username baru!'
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
                'title' => 'Tambah Pengguna',
                'isi' => 'admin/user/tambah'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk Databasenya Bro
        } else {
            $i = $this->input;
            $data = array(
                'nama'                  => $i->post('nama'),
                'email'                 => $i->post('email'),
                'username'              => $i->post('username'),
                'password'              => SHA1($i->post('password')),
                'akses_level'           => $i->post('akses_level')
            );
            $this->m_user->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Telah Ditambah!');
            redirect(base_url('admin/user'), 'refresh');
        }
        //End Masuk Database Bro!
    }


    //Edit User
    public function edit($id_user)
    {
        $user = $this->m_user->detail($id_user);

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama',
            'Nama lengkap',
            'required',
            array('required'    => '%s harus diisi')
        );
        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required'    => '%s harus diisi',
                'valid_email' => '%s tidak valid'
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
                'title' => 'Edit Pengguna',
                'user'  => $user,
                'isi' => 'admin/user/edit'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk Databasenya Bro
        } else {
            $i = $this->input;
            $data = array(
                'id_user'               => $id_user,
                'nama'                  => $i->post('nama'),
                'email'                 => $i->post('email'),
                'username'              => $i->post('username'),
                'password'              => SHA1($i->post('password')),
                'akses_level'           => $i->post('akses_level')
            );
            $this->m_user->edit($data);
            $this->session->set_flashdata('sukses', 'Data Telah Diedit!');
            redirect(base_url('admin/user'), 'refresh');
        }
        //End Masuk Database Bro!
    }


    public function delete($id_user)
    {
        $data = array('id_user' => $id_user);
        $this->m_user->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus!');
        redirect(base_url('admin/user'), 'refresh');
    }
}
