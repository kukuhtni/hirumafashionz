<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
    //Load Model
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konfigurasi');
        //Proteksi halaman
        $this->simple_login->cek_login();
    }

    // Konfigurasi Umum
    public function index()
    {
        $konfigurasi = $this->m_konfigurasi->listing();

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'namaweb',
            'Nama website',
            'required',
            array(
                'required'    => '%s harus diisi'
            )
        );

        if ($valid->run() === FALSE) {
            //End Validasi Bro
            $data = array(
                'title'         => 'Tambah Konfigurasi Website',
                'konfigurasi'   => $konfigurasi,
                'isi'           => 'admin/konfigurasi/list'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk Databasenya Bro
        } else {
            $i = $this->input;

            $data = array(
                'id_konfigurasi'                => $konfigurasi->id_konfigurasi,
                'namaweb'                       => $i->post('namaweb'),
                'tagline'                       => $i->post('tagline'),
                'email'                         => $i->post('email'),
                'website'                       => $i->post('website'),
                'keyword'                       => $i->post('keyword'),
                'metatext'                      => $i->post('metatext'),
                'telephone'                     => $i->post('telephone'),
                'alamat'                        => $i->post('alamat'),
                'facebook'                      => $i->post('facebook'),
                'instagram'                     => $i->post('instagram'),
                'deskripsi'                     => $i->post('deskripsi'),
                'rek_pembayaran'                => $i->post('rek_pembayaran')
            );
            $this->m_konfigurasi->edit($data);
            $this->session->set_flashdata('sukses', 'Data Telah Diupdate!');
            redirect(base_url('admin/konfigurasi'), 'refresh');
        }
        //End Masuk Database Bro!
    }

    //Konfigurasi Logo Website
    public function logo()
    {
        $konfigurasi = $this->m_konfigurasi->listing();

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'namaweb',
            'Nama website',
            'required',
            array('required'    => '%s harus diisi')
        );

        if ($valid->run()) {
            //Check jika logo diganti
            if (!empty($_FILES['logo']['name'])) {

                $config['upload_path'] = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2400';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('logo')) {



                    //End Validasi Bro
                    $data = array(
                        'title'         => 'Konfigurasi Website',
                        'konfigurasi'   => $konfigurasi,
                        'error'         => $this->upload->display_errors(),
                        'isi'           => 'admin/konfigurasi/logo'
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
                        'id_konfigurasi'        => $konfigurasi->id_konfigurasi,
                        'namaweb'               => $i->post('namaweb'),
                        //Disimpan Nama File Gambar

                        'logo'                  => unlink('./assets/upload/image/' . $konfigurasi->logo),
                        'logo'                  => unlink('./assets/upload/image/thumbs/' . $konfigurasi->logo),
                        'logo'                  => $upload_gambar['upload_data']['file_name']
                    );
                    $this->m_konfigurasi->edit($data);
                    $this->session->set_flashdata('sukses', 'Data Telah Diupdate!');
                    redirect(base_url('admin/konfigurasi/logo'), 'refresh');
                }
            } else {
                //Edit Produk tanpa ganti gambar
                $i = $this->input;

                $data = array(
                    'id_konfigurasi'        => $konfigurasi->id_konfigurasi,
                    'namaweb'               => $i->post('namaweb'),
                    //Disimpan Nama File Gambar
                    //'logo'                => $upload_gambar['upload_data']['file_name']
                );
                $this->m_konfigurasi->edit($data);
                $this->session->set_flashdata('sukses', 'Data Telah Diupdate!');
                redirect(base_url('admin/konfigurasi/logo'), 'refresh');
            }
        }
        //End Masuk Database Bro!
        $data = array(
            'title'         => 'Konfigurasi Website',
            'konfigurasi'   => $konfigurasi,
            'isi'           => 'admin/konfigurasi/logo'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Konfigurasi Icon Website
    public function icon()
    {
        $konfigurasi = $this->m_konfigurasi->listing();

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'namaweb',
            'Nama website',
            'required',
            array('required'    => '%s harus diisi')
        );

        if ($valid->run()) {
            //Check jika Icon diganti
            if (!empty($_FILES['icon']['name'])) {

                $config['upload_path'] = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2400';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('icon')) {



                    //End Validasi Bro
                    $data = array(
                        'title'         => 'Konfigurasi Website',
                        'konfigurasi'   => $konfigurasi,
                        'error'         => $this->upload->display_errors(),
                        'isi'           => 'admin/konfigurasi/icon'
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
                        'id_konfigurasi'        => $konfigurasi->id_konfigurasi,
                        'namaweb'               => $i->post('namaweb'),
                        //Disimpan Nama File Gambar

                        'icon'                  => unlink('./assets/upload/image/' . $konfigurasi->icon),
                        'icon'                  => unlink('./assets/upload/image/thumbs/' . $konfigurasi->icon),
                        'icon'                  => $upload_gambar['upload_data']['file_name']
                    );
                    $this->m_konfigurasi->edit($data);
                    $this->session->set_flashdata('sukses', 'Data Telah Diupdate!');
                    redirect(base_url('admin/konfigurasi/icon'), 'refresh');
                }
            } else {
                //Edit Produk tanpa ganti gambar
                $i = $this->input;

                $data = array(
                    'id_konfigurasi'        => $konfigurasi->id_konfigurasi,
                    'namaweb'               => $i->post('namaweb'),
                    //Disimpan Nama File Gambar
                    //'icon'                => $upload_gambar['upload_data']['file_name']
                );
                $this->m_konfigurasi->edit($data);
                $this->session->set_flashdata('sukses', 'Data Telah Diupdate!');
                redirect(base_url('admin/konfigurasi/icon'), 'refresh');
            }
        }
        //End Masuk Database Bro!
        $data = array(
            'title'         => 'Konfigurasi Website',
            'konfigurasi'   => $konfigurasi,
            'isi'           => 'admin/konfigurasi/icon'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
