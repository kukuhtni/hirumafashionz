<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
        //Proteksi halaman
        $this->simple_login->cek_login();
    }

    // Data User
    public function index()
    {
        $kategori = $this->m_kategori->listing();
        $data = array(
            'title' => 'Data Kategori Produk',
            'kategori' => $kategori,
            'isi' => 'admin/kategori/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    //Tambah User
    public function tambah()
    {
        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_kategori',
            'Nama kategori',
            'required|is_unique[tb_kategori.nama_kategori]',
            array(
                'required'      => '%s harus diisi',
                'is_unique'     => '%s sudah ada!, Buat Kategori Baru Bung!'
            )
        );

        if ($valid->run() === FALSE) {
            //End Validasi Bro
            $data = array(
                'title' => 'Tambah Kategori Produk',
                'isi' => 'admin/kategori/tambah'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk Databasenya Bro
        } else {
            $i = $this->input;

            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
            $data = array(
                'slug_kategori'                 => $slug_kategori,
                'nama_kategori'                 => $i->post('nama_kategori'),
                'urutan'                        => $i->post('urutan')
            );
            $this->m_kategori->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Telah Ditambah!');
            redirect(base_url('admin/kategori'), 'refresh');
        }
        //End Masuk Database Bro!
    }


    //Edit User
    public function edit($id_kategori)
    {
        $kategori = $this->m_kategori->detail($id_kategori);

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_kategori',
            'Nama kategori',
            'required',
            array('required'    => '%s harus diisi')
        );


        if ($valid->run() === FALSE) {
            //End Validasi Bro
            $data = array(
                'title' => 'Edit Kategori Produk',
                'kategori'  => $kategori,
                'isi' => 'admin/kategori/edit'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk Databasenya Bro
        } else {
            $i = $this->input;
            $slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
            $data = array(
                'id_kategori'               => $id_kategori,
                'slug_kategori'             => $slug_kategori,
                'nama_kategori'             => $i->post('nama_kategori'),
                'urutan'                    => $i->post('urutan')
            );
            $this->m_kategori->edit($data);
            $this->session->set_flashdata('sukses', 'Data Telah Diedit!');
            redirect(base_url('admin/kategori'), 'refresh');
        }
        //End Masuk Database Bro!
    }


    public function delete($id_kategori)
    {
        $data = array('id_kategori' => $id_kategori);
        $this->m_kategori->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus!');
        redirect(base_url('admin/kategori'), 'refresh');
    }
}
