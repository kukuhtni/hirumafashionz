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
        //Proteksi halaman
        $this->simple_login->cek_login();
    }

    // Data produk
    public function index()
    {
        $produk = $this->m_produk->listing();
        $data = array(
            'title' => 'Data Produk',
            'produk' => $produk,
            'isi' => 'admin/produk/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Gambar
    public function gambar($id_produk)
    {
        $produk = $this->m_produk->detail($id_produk);
        $gambar = $this->m_produk->gambar($id_produk);

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'judul_gambar',
            'Judul/Nama Gambar',
            'required',
            array('required'    => '%s harus diisi')
        );

        if ($valid->run()) {
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2400';
            $config['max_width'] = '2024';
            $config['max_height'] = '2024';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {



                //End Validasi Bro
                $data = array(
                    'title'     => 'Tambah Gambar Produk: ' . $produk->nama_produk,
                    'produk'    => $produk,
                    'gambar'    => $gambar,
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'admin/produk/gambar'
                );
                $this->load->view('admin/layout/wrapper', $data, FALSE);
                //Masuk Databasenya Bro
            } else {
                $upload_gambar = array('upload_data' => $this->upload->data());

                //Create Thumbnile Gambar
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
                //Lokasi Folder thumbnail
                $config['new_image']        = './assets/upload/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250; //Ukuran pixell
                $config['height']           = 250; //Ukuran pixell
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                //End Create Thumbnail


                $i = $this->input;

                $data = array(
                    'id_produk'             => $id_produk,
                    'judul_gambar'          => $i->post('judul_gambar'),
                    //Disimpan Nama File Gambar
                    'gambar'                => $upload_gambar['upload_data']['file_name']
                );
                $this->m_produk->tambah_gambar($data);
                $this->session->set_flashdata('sukses', 'Data Gambar Telah Ditambah!');
                redirect(base_url('admin/produk/gambar/' . $id_produk), 'refresh');
            }
        }
        //End Masuk Database Bro!
        $data = array(
            'title'     => 'Tambah Gambar Produk:' . $produk->nama_produk,
            'produk'    => $produk,
            'gambar'    => $gambar,
            'isi'       => 'admin/produk/gambar'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Tambah Produk
    public function tambah()
    {
        //Ambil data kategori
        $kategori = $this->m_kategori->listing();

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_produk',
            'Nama Produk',
            'required',
            array('required'    => '%s harus diisi')
        );
        $valid->set_rules(
            'kode_produk',
            'Kode Produk',
            'required|is_unique[tb_produk.kode_produk]',
            array(
                'required'    => '%s harus diisi',
                'is_unique'    => '%s sudah ada. Buat kode produk baru'
            )
        );

        if ($valid->run()) {
            $config['upload_path'] = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2400';
            $config['max_width'] = '2024';
            $config['max_height'] = '2024';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {



                //End Validasi Bro
                $data = array(
                    'title'     => 'Tambah Produk',
                    'kategori'  => $kategori,
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'admin/produk/tambah'
                );
                $this->load->view('admin/layout/wrapper', $data, FALSE);
                //Masuk Databasenya Bro
            } else {
                $upload_gambar = array('upload_data' => $this->upload->data());

                //Create Thumbnile Gambar
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
                //Lokasi Folder thumbnail
                $config['new_image']        = './assets/upload/image/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['width']            = 250; //Ukuran pixell
                $config['height']           = 250; //Ukuran pixell
                $config['thumb_marker']     = '';

                $this->load->library('image_lib', $config);

                $this->image_lib->resize();
                //End Create Thumbnail


                $i = $this->input;
                //SLUG PRODUK
                $slug_produk = url_title($this->input->post('nama_produk') . '.' . $this->input->post('kode_produk'), 'dash', TRUE);
                $data = array(
                    'id_user'               => $this->session->userdata('id_user'),
                    'id_kategori'           => $i->post('id_kategori'),
                    'kode_produk'           => $i->post('kode_produk'),
                    'nama_produk'           => $i->post('nama_produk'),
                    'slug_produk'           => $slug_produk,
                    'keterangan'            => $i->post('keterangan'),
                    'keyword'               => $i->post('keyword'),
                    'harga'                 => $i->post('harga'),
                    'stok'                  => $i->post('stok'),
                    //Disimpan Nama File Gambar
                    'gambar'                => $upload_gambar['upload_data']['file_name'],
                    'berat'                 => $i->post('berat'),
                    'ukuran'                => $i->post('ukuran'),
                    'status_produk'         => $i->post('status_produk'),
                    'tanggal_post'          => date('Y-m-d H:i:s')
                );
                $this->m_produk->tambah($data);
                $this->session->set_flashdata('sukses', 'Data Telah Ditambah!');
                redirect(base_url('admin/produk'), 'refresh');
            }
        }
        //End Masuk Database Bro!
        $data = array(
            'title'     => 'Tambah Produk',
            'kategori'  => $kategori,
            'isi'       => 'admin/produk/tambah'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    //Edit Produk
    public function edit($id_produk)
    {
        //Ambil data produk yang akan diedit
        $produk     = $this->m_produk->detail($id_produk);
        //Ambil data kategori yang akan diedit
        $kategori   = $this->m_kategori->listing();
        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_produk',
            'Nama produk',
            'required',
            array('required'    => '%s harus diisi')
        );
        $valid->set_rules(
            'kode_produk',
            'Kode produk',
            'required',
            array(
                'required'    => '%s harus diisi'
            )
        );

        if ($valid->run()) {
            //Check jika gambar diganti
            if (!empty($_FILES['gambar']['name'])) {

                $config['upload_path'] = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2400';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {



                    //End Validasi Bro
                    $data = array(
                        'title'     => 'Edit Produk: ' . $produk->nama_produk,
                        'kategori'  => $kategori,
                        'produk'    => $produk,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/produk/edit'
                    );
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                    //Masuk Databasenya Bro
                } else {
                    $upload_gambar = array('upload_data' => $this->upload->data());

                    //Create Thumbnile Gambar
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
                    //Lokasi Folder thumbnail
                    $config['new_image']        = './assets/upload/image/thumbs/';
                    $config['create_thumb']     = TRUE;
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 250; //Ukuran pixell
                    $config['height']           = 250; //Ukuran pixell
                    $config['thumb_marker']     = '';

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    //End Create Thumbnail


                    $i = $this->input;
                    //SLUG PRODUK
                    $slug_produk = url_title($this->input->post('nama_produk') . '.' . $this->input->post('kode_produk'), 'dash', TRUE);
                    $data = array(
                        'id_produk'             => $id_produk,
                        'id_user'               => $this->session->userdata('id_user'),
                        'id_kategori'           => $i->post('id_kategori'),
                        'kode_produk'           => $i->post('kode_produk'),
                        'nama_produk'           => $i->post('nama_produk'),
                        'slug_produk'           => $slug_produk,
                        'keterangan'            => $i->post('keterangan'),
                        'keyword'               => $i->post('keyword'),
                        'harga'                 => $i->post('harga'),
                        'stok'                  => $i->post('stok'),
                        'gambar'                => unlink('./assets/upload/image/' . $produk->gambar),
                        'gambar'                => unlink('./assets/upload/image/thumbs/' . $produk->gambar),
                        //Disimpan Nama File Gambar
                        'gambar'                => $upload_gambar['upload_data']['file_name'],
                        'berat'                 => $i->post('berat'),
                        'ukuran'                => $i->post('ukuran'),
                        'status_produk'         => $i->post('status_produk')
                    );
                    $this->m_produk->edit($data);
                    $this->session->set_flashdata('sukses', 'Data Telah Diedit!');
                    redirect(base_url('admin/produk'), 'refresh');
                }
            } else {
                //Edit Produk tanpa ganti gambar
                $i = $this->input;
                //SLUG PRODUK
                $slug_produk = url_title($this->input->post('nama_produk') . '.' . $this->input->post('kode_produk'), 'dash', TRUE);
                $data = array(
                    'id_produk'             => $id_produk,
                    'id_user'               => $this->session->userdata('id_user'),
                    'id_kategori'           => $i->post('id_kategori'),
                    'kode_produk'           => $i->post('kode_produk'),
                    'nama_produk'           => $i->post('nama_produk'),
                    'slug_produk'           => $slug_produk,
                    'keterangan'            => $i->post('keterangan'),
                    'keyword'               => $i->post('keyword'),
                    'harga'                 => $i->post('harga'),
                    'stok'                  => $i->post('stok'),
                    //Disimpan Nama File Gambar ( Gambar gak diganti)
                    //'gambar'                => $upload_gambar['upload_data']['file_name'],
                    'berat'                 => $i->post('berat'),
                    'ukuran'                => $i->post('ukuran'),
                    'status_produk'         => $i->post('status_produk')
                );
                $this->m_produk->edit($data);
                $this->session->set_flashdata('sukses', 'Data Telah Diedit!');
                redirect(base_url('admin/produk'), 'refresh');
            }
        }
        //End Masuk Database Bro!
        $data = array(
            'title'     => 'Edit Produk : ' . $produk->nama_produk,
            'kategori'  => $kategori,
            'produk'    => $produk,
            'isi'       => 'admin/produk/edit'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Delete Produk
    public function delete($id_produk)
    {
        //Proses hapus gambar
        $produk = $this->m_produk->detail($id_produk);
        unlink('./assets/upload/image/' . $produk->gambar);
        unlink('./assets/upload/image/thumbs/' . $produk->gambar);
        //End Proses Hapus
        $data = array('id_produk' => $id_produk);
        $this->m_produk->delete($data);
        $this->session->set_flashdata('sukses', 'Data Telah Dihapus!');
        redirect(base_url('admin/produk'), 'refresh');
    }
    //Delete Gambar Produk
    public function delete_gambar($id_produk, $id_gambar)
    {
        //Proses hapus gambar
        $gambar = $this->m_produk->detail_gambar($id_gambar);
        unlink('./assets/upload/image/' . $gambar->gambar);
        unlink('./assets/upload/image/thumbs/' . $gambar->gambar);
        //End Proses Hapus
        $data = array('id_gambar' => $id_gambar);
        $this->m_produk->delete_gambar($data);
        $this->session->set_flashdata('sukses', 'Data Data Gambar Telah Dihapus!');
        redirect(base_url('admin/produk/gambar/' . $id_produk), 'refresh');
    }
}
