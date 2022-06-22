<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{
    //Load Database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // listing All Produk
    public function listing()
    {
        $this->db->select('tb_produk.*,
                            tb_users.nama,
                            tb_kategori.nama_kategori,
                            tb_kategori.slug_kategori,
                            COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        //JOIN
        $this->db->join('tb_users', 'tb_users.id_user = tb_produk.id_user', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        //END JOIN
        $this->db->group_by('tb_produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    // listing All Produk Home
    public function home()
    {
        $this->db->select('tb_produk.*,
                            tb_users.nama,
                            tb_kategori.nama_kategori,
                            tb_kategori.slug_kategori,
                            COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        //JOIN
        $this->db->join('tb_users', 'tb_users.id_user = tb_produk.id_user', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        //END JOIN
        $this->db->where('tb_produk.status_produk', 'Publish');
        $this->db->group_by('tb_produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit(12);
        $query = $this->db->get();
        return $query->result();
    }

    // listing All Produk Home
    public function read($slug_produk)
    {
        $this->db->select('tb_produk.*,
                            tb_users.nama,
                            tb_kategori.nama_kategori,
                            tb_kategori.slug_kategori,
                            COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        //JOIN
        $this->db->join('tb_users', 'tb_users.id_user = tb_produk.id_user', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        //END JOIN
        $this->db->where('tb_produk.status_produk', 'Publish');
        $this->db->where('tb_produk.slug_produk', $slug_produk);
        $this->db->group_by('tb_produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Produk
    // listing All Produk Home
    public function produk($limit, $start)
    {
        $this->db->select('tb_produk.*,
                            tb_users.nama,
                            tb_kategori.nama_kategori,
                            tb_kategori.slug_kategori,
                            COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        //JOIN
        $this->db->join('tb_users', 'tb_users.id_user = tb_produk.id_user', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        //END JOIN
        $this->db->where('tb_produk.status_produk', 'Publish');
        $this->db->group_by('tb_produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    //Total Produk
    public function total_produk()
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('tb_produk');
        $this->db->where('status_produk', 'Publish');
        $query = $this->db->get();
        return $query->row();
    }

    //Kategori Produk
    // listing All Produk Home
    public function kategori($id_kategori, $limit, $start)
    {
        $this->db->select('tb_produk.*,
                            tb_users.nama,
                            tb_kategori.nama_kategori,
                            tb_kategori.slug_kategori,
                            COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        //JOIN
        $this->db->join('tb_users', 'tb_users.id_user = tb_produk.id_user', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        //END JOIN
        $this->db->where('tb_produk.status_produk', 'Publish');
        $this->db->where('tb_produk.id_kategori', $id_kategori);
        $this->db->group_by('tb_produk.id_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    //Total KategoriProduk
    public function total_kategori($id_kategori)
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('tb_produk');
        $this->db->where('status_produk', 'Publish');
        $this->db->where('id_kategori', '$id_kategori');
        $query = $this->db->get();
        return $query->row();
    }

    //Listing Kategori
    public function listing_kategori()
    {
        $this->db->select('tb_produk.*,
                         tb_users.nama,
                         tb_kategori.nama_kategori,
                         tb_kategori.slug_kategori,
                         COUNT(tb_gambar.id_gambar) AS total_gambar');
        $this->db->from('tb_produk');
        //JOIN
        $this->db->join('tb_users', 'tb_users.id_user = tb_produk.id_user', 'left');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
        $this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
        //END JOIN
        $this->db->group_by('tb_produk.id_kategori');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Data Detail
    public function detail($id_produk)
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Data Detail Gambar
    public function detail_gambar($id_gambar)
    {
        $this->db->select('*');
        $this->db->from('tb_gambar');
        $this->db->where('id_gambar', $id_gambar);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    //Gambar
    public function gambar($id_produk)
    {
        $this->db->select('*');
        $this->db->from('tb_gambar');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_gambar', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Tambah Datanya
    public function tambah($data)
    {
        $this->db->insert('tb_produk', $data);
    }

    //Tambah Gambarnya
    public function tambah_gambar($data)
    {
        $this->db->insert('tb_gambar', $data);
    }

    //Edit Datanya
    public function edit($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('tb_produk', $data);
    }

    //Delete Datanya
    public function delete($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('tb_produk', $data);
    }

    //Delete Data gambar
    public function delete_gambar($data)
    {
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('tb_gambar', $data);
    }
}
