<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_rekening extends CI_Model
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
        $this->db->from('tb_rekening');
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Data Detail
    public function detail($id_rekening)
    {
        $this->db->select('*');
        $this->db->from('tb_rekening');
        $this->db->where('id_rekening', $id_rekening);
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Data slug rekening
    public function read($slug_rekening)
    {
        $this->db->select('*');
        $this->db->from('tb_rekening');
        $this->db->where('slug_rekening', $slug_rekening);
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tb_rekening');
        $this->db->where(array(
            'username' => $username,
            'password' => SHA1($password)
        ));
        $this->db->order_by('id_rekening', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Tambah Datanya
    public function tambah($data)
    {
        $this->db->insert('tb_rekening', $data);
    }

    //Edit Datanya
    public function edit($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->update('tb_rekening', $data);
    }

    //Delete Datanya
    public function delete($data)
    {
        $this->db->where('id_rekening', $data['id_rekening']);
        $this->db->delete('tb_rekening', $data);
    }
}
