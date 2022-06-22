<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    //Load Database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // listing All User
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // listing all transaksi Berdasarkan header
    public function kode_transaksi($kode_transaksi)
    {
        $this->db->select('tb_transaksi.*,
                            tb_produk.nama_produk,
                            tb_produk.kode_produk');
        $this->db->from('tb_transaksi');
        //Join Dengan Produk
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_transaksi.id_produk', 'left');
        //End Join Bro
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Data Detail
    public function detail($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Data slug transaksi
    public function read($slug_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('slug_transaksi', $slug_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where(array(
            'username' => $username,
            'password' => SHA1($password)
        ));
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Tambah Datanya
    public function tambah($data)
    {
        $this->db->insert('tb_transaksi', $data);
    }

    //Edit Datanya
    public function edit($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tb_transaksi', $data);
    }

    //Delete Datanya
    public function delete($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->delete('tb_transaksi', $data);
    }
}
