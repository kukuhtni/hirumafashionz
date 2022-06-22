<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
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
        $this->db->from('tb_kategori');
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Data Detail
    public function detail($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->where('id_kategori', $id_kategori);
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Data slug kategori
    public function read($slug_kategori)
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->where('slug_kategori', $slug_kategori);
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->where(array(
            'username' => $username,
            'password' => SHA1($password)
        ));
        $this->db->order_by('id_kategori', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Tambah Datanya
    public function tambah($data)
    {
        $this->db->insert('tb_kategori', $data);
    }

    //Edit Datanya
    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('tb_kategori', $data);
    }

    //Delete Datanya
    public function delete($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('tb_kategori', $data);
    }
}
