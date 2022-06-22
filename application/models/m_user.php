<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
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
        $this->db->from('tb_users');
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Data Detail
    public function detail($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where(array(
            'username' => $username,
            'password' => SHA1($password)
        ));
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Tambah Datanya
    public function tambah($data)
    {
        $this->db->insert('tb_users', $data);
    }

    //Edit Datanya
    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tb_users', $data);
    }

    //Delete Datanya
    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('tb_users', $data);
    }
}
