<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
        //$this->load->model('m_gambar');
    }
    //Halaman Utama Website Hiruma
    public function index()
    {
        $site                   = $this->m_konfigurasi->listing();
        $listing_kategori       = $this->m_produk->listing_kategori();
        //Ambil data total
        $total                  = $this->m_produk->total_produk();
        //Start Pagination
        $this->load->library('pagination');

        $config['base_url']         = base_url() . 'produk/index/';
        $config['total_rows']       = $total->total;
        $config['use_page_numbers'] = TRUE;
        $config['per_page']         = 6;
        $config['uri_segment']      = 3;
        $config['num_links']        = 5;
        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'last';
        $config['last_tag_open']    = '<li class="disabled"><li class="active"<a href="#"';
        $config['last_tag_close']   = '<span class="sr-only"></a></li></li>';
        $config['next_link']        = '&gt';
        $config['next_tag_open']    = '<div>';
        $config['next_tag_close']   = '</div>';
        $config['prev_link']        = '&lt;';
        $config['prev_tag_open']    = '<div>';
        $config['prev_tag_close']   = '</div>';
        $config['cur_tag_open']     = '<b>';
        $config['cur_tag_close']    = '</b>';
        $config['first_url']        = base_url() . '/produk/';

        $this->pagination->initialize($config);

        $page                       = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
        $produk                     = $this->m_produk->produk($config['per_page'], $page);

        //End Pagination
        $data   = array(
            'title'                 => 'Produk ' . $site->namaweb,
            'site'                  => $site,
            'listing_kategori'      => $listing_kategori,
            'produk'                => $produk,
            'pagin'                 => $this->pagination->create_links(),
            'isi'                   => 'produk/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //Halaman Utama Kategori Hiruma
    public function kategori($slug_kategori)
    {
        //kategori detail
        $kategori               = $this->m_kategori->read($slug_kategori);
        $id_kategori            = $kategori->id_kategori;
        //Data Global
        $site                   = $this->m_konfigurasi->listing();
        $listing_kategori       = $this->m_produk->listing_kategori();
        //Ambil data total
        $total                  = $this->m_produk->total_kategori($id_kategori);
        //Start Pagination
        $this->load->library('pagination');

        $config['base_url']         = base_url() . 'produk/kategori/' . $slug_kategori . '/index/';
        $config['total_rows']       = $total->total;
        $config['use_page_numbers'] = TRUE;
        $config['per_page']         = 6;
        $config['uri_segment']      = 5;
        $config['num_links']        = 5;
        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'last';
        $config['last_tag_open']    = '<li class="disabled"><li class="active"<a href="#"';
        $config['last_tag_close']   = '<span class="sr-only"></a></li></li>';
        $config['next_link']        = '&gt';
        $config['next_tag_open']    = '<div>';
        $config['next_tag_close']   = '</div>';
        $config['prev_link']        = '&lt;';
        $config['prev_tag_open']    = '<div>';
        $config['prev_tag_close']   = '</div>';
        $config['cur_tag_open']     = '<b>';
        $config['cur_tag_close']    = '</b>';
        $config['first_url']        = base_url() . '/produk/kategori/' . $slug_kategori;

        $this->pagination->initialize($config);

        $page                       = ($this->uri->segment(5)) ? ($this->uri->segment(5) - 1) * $config['per_page'] : 0;
        $produk                     = $this->m_produk->kategori($id_kategori, $config['per_page'], $page);

        //End Pagination
        $data   = array(
            'title'                 => $kategori->nama_kategori,
            'site'                  => $site,
            'listing_kategori'      => $listing_kategori,
            'produk'                => $produk,
            'pagin'                 => $this->pagination->create_links(),
            'isi'                   => 'produk/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }


    //Detail Produk
    public function detail($slug_produk)
    {
        $site       = $this->m_konfigurasi->listing();
        $produk     = $this->m_produk->read($slug_produk);
        $id_produk  = $produk->id_produk;
        $gambar     = $this->m_produk->gambar($id_produk);
        $produk_related = $this->m_produk->home();

        $data   = array(
            'title'                 => $produk->nama_produk,
            'site'                  => $site,
            'produk'                => $produk,
            'produk_related'        => $produk_related,
            'gambar'                => $gambar,
            'isi'                   => 'produk/detail'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
