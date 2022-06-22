<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
        $this->load->model('m_konfigurasi');
    }
    //Halaman Utama Website Hiruma
    public function index()
    {
        $site       = $this->m_konfigurasi->listing();
        $kategori   = $this->m_konfigurasi->nav_produk();
        $produk     = $this->m_produk->home();
        $data = array(
            'title' => $site->namaweb . ' | ' . $site->tagline,
            'keyword' => $site->keyword,
            'deskripsi' => $site->deskripsi,
            'site' => $site,
            'kategori' => $kategori,
            'produk' => $produk,
            'isi' => 'home/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
