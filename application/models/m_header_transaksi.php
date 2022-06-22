<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_header_transaksi extends CI_Model
{
    //Load Database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // listing All header_transaksi
    public function listing()
    {
        $this->db->select('tb_header_transaksi.*,
        tb_pelanggan.nama_pelanggan,
        SUM(tb_transaksi.jumlah) AS total_item');
        $this->db->from('tb_header_transaksi');
        //Join
        $this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 'left');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_header_transaksi.id_pelanggan', 'left');
        //End Join
        $this->db->group_by('tb_header_transaksi.id_header_transaksi');
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    // Listing all Header_transaksi dari pelanggan
    public function pelanggan($id_pelanggan)
    {
        $this->db->select('tb_header_transaksi.*,
                             SUM(tb_transaksi.jumlah) AS total_item');
        $this->db->from('tb_header_transaksi');
        $this->db->where('tb_header_transaksi.id_pelanggan', $id_pelanggan);
        //Join
        $this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 'left');
        //End Join
        $this->db->group_by('tb_header_transaksi.id_header_transaksi');
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Data Kode Transaksi
    public function kode_transaksi($kode_transaksi)
    {
        $this->db->select('tb_header_transaksi.*,
        tb_pelanggan.nama_pelanggan,
        tb_rekening.nama_bank AS bank,
        tb_rekening.nomor_rekening,
        tb_rekening.nama_pemilik,
        SUM(tb_transaksi.jumlah) AS total_item');
        $this->db->from('tb_header_transaksi');
        //Join
        $this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 'left');
        $this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_header_transaksi.id_pelanggan', 'left');
        $this->db->join('tb_rekening', 'tb_rekening.id_rekening = tb_header_transaksi.id_rekening', 'left');
        //End Join
        $this->db->group_by('tb_header_transaksi.id_header_transaksi');
        $this->db->where('tb_transaksi.kode_transaksi', $kode_transaksi);
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }


    //Data Detail
    public function detail($id_header_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tb_header_transaksi');
        $this->db->where('id_header_transaksi', $id_header_transaksi);
        $this->db->order_by('id_header_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // //header_transaksi sudah login
    // public function sudah_login($email, $nama_header_transaksi)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_header_transaksi');
    //     $this->db->where('email', $email);
    //     $this->db->where('nama_header_transaksi', $nama_header_transaksi);
    //     $this->db->order_by('id_header_transaksi', 'desc');
    //     $query = $this->db->get();
    //     return $query->row();
    // }

    // public function login($email, $password)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_header_transaksi');
    //     $this->db->where(array(
    //         'email' => $email,
    //         'password' => SHA1($password)
    //     ));
    //     $this->db->order_by('id_header_transaksi', 'desc');
    //     $query = $this->db->get();
    //     return $query->row();
    // }

    //Tambah Datanya
    public function tambah($data)
    {
        $this->db->insert('tb_header_transaksi', $data);
    }

    //Edit Datanya
    public function edit($data)
    {
        $this->db->where('id_header_transaksi', $data['id_header_transaksi']);
        $this->db->update('tb_header_transaksi', $data);
    }

    //Delete Datanya
    public function delete($data)
    {
        $this->db->where('id_header_transaksi', $data['id_header_transaksi']);
        $this->db->delete('tb_header_transaksi', $data);
    }
}
