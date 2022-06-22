<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_rekening');
        //Proteksi halaman
        $this->simple_login->cek_login();
    }

    // Data User
    public function index()
    {
        $rekening = $this->m_rekening->listing();
        $data = array(
            'title' => 'Data Rekening',
            'rekening' => $rekening,
            'isi' => 'admin/rekening/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    //Tambah Bank
    public function tambah()
    {
        // $this->load->helper('security');
        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bank',
            'Nama bank',
            'required',
            array(
                'required'    => '%s harus diisi'
            )
        );
        $valid->set_rules(
            'nama_pemilik',
            'Nama pemilik rekening',
            'required',
            array(
                'required'    => '%s harus diisi'
            )
        );
        $valid->set_rules(
            'nomor_rekening',
            'Nomor rekening',
            'required|is_unique[tb_rekening.nomor_rekening]',
            array(
                'required'      => '%s harus diisi',
                'is_unique'     => '%s sudah ada!, Buat nomor rekening Baru Bung!'
            )
        );

        if ($valid->run() === FALSE) {
            //End Validasi Bro
            $data = array(
                'title' => 'Tambah Rekening',
                'isi' => 'admin/rekening/tambah'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk Databasenya Bro
        } else {
            $i = $this->input;


            $data = array(
                'nama_bank'                 => $i->post('nama_bank'),
                'nomor_rekening'            => $i->post('nomor_rekening'),
                'nama_pemilik'              => $i->post('nama_pemilik')
            );
            $this->m_rekening->tambah($data);
            $this->session->set_flashdata('sukses', 'Data Telah Ditambah!');
            redirect(base_url('admin/rekening'), 'refresh');
        }
        //End Masuk Database Bro!
    }


    //Edit User
    public function edit($id_rekening)
    {
        $rekening = $this->m_rekening->detail($id_rekening);

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bank',
            'Nama Rekening',
            'required',
            array('required'    => '%s harus diisi')
        );


        if ($valid->run() === FALSE) {
            //End Validasi Bro
            $data = array(
                'title' => 'Edit Rekening',
                'rekening'  => $rekening,
                'isi' => 'admin/rekening/edit'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk Databasenya Bro
        } else {
            $i = $this->input;
            $data = array(
                'id_rekening'               => $id_rekening,
                'nama_bank'                 => $i->post('nama_bank'),
                'nomor_rekening'            => $i->post('nomor_rekening'),
                'nama_pemilik'              => $i->post('nama_pemilik')
            );
            $this->m_rekening->edit($data);
            $this->session->set_flashdata('sukses', 'Data Telah Diedit!');
            redirect(base_url('admin/rekening'), 'refresh');
        }
        //End Masuk Database Bro!
    }


    public function delete($id_rekening)
    {
        $data = array('id_rekening' => $id_rekening);
        $this->m_rekening->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus!');
        redirect(base_url('admin/rekening'), 'refresh');
    }
}
