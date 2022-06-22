<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_header_transaksi');
        $this->load->model('m_transaksi');
        $this->load->model('m_rekening');
        //Halaman ini diproteksi dengan Simple_pelanggan => Check Sudah login Belum
        $this->simple_pelanggan->cek_login();
    }
    //Halaman Utama Website Hiruma
    public function index()
    {
        //Ambil Data Login
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $header_transaksi = $this->m_header_transaksi->pelanggan($id_pelanggan);


        $data = array(
            'title'                 => 'Halaman Dashboard Pelanggan',
            'header_transaksi'      => $header_transaksi,
            'isi'                   => 'dashboard/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //Belanja
    public function belanja()
    {
        //Ambil Data Login
        $id_pelanggan       = $this->session->userdata('id_pelanggan');
        $header_transaksi   = $this->m_header_transaksi->pelanggan($id_pelanggan);

        $data = array(
            'title'                 => 'Riwayat Belanja',
            'header_transaksi'      => $header_transaksi,
            'isi'                   => 'dashboard/belanja'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //Detail
    public function detail($kode_transaksi)
    {
        //Ambil Data Login
        $id_pelanggan       = $this->session->userdata('id_pelanggan');
        $header_transaksi   = $this->m_header_transaksi->kode_transaksi($kode_transaksi);
        $transaksi          = $this->m_transaksi->kode_transaksi($kode_transaksi);

        //Pastikan bahwa pelanggan hanya mengakses data transaksi
        if ($header_transaksi->id_pelanggan != $id_pelanggan) {
            $this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
            redirect(base_url('masuk'));
        }

        $data = array(
            'title'                 => 'Riwayat Belanja',
            'header_transaksi'      => $header_transaksi,
            'transaksi'             => $transaksi,
            'isi'                   => 'dashboard/detail'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //Profile
    public function profile()
    {
        //Ambil data login id_pelanggan dari seasson
        $id_pelanggan           = $this->session->userdata('id_pelanggan');
        $pelanggan              = $this->m_pelanggan->detail($id_pelanggan);

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_pelanggan',
            'Nama lengkap',
            'required',
            array('required'    => '%s harus diisi')
        );
        $valid->set_rules(
            'alamat',
            'Alamat lengkap',
            'required',
            array('required'    => '%s harus diisi')
        );
        $valid->set_rules(
            'telephone',
            'Nomor telephone',
            'required',
            array('required'    => '%s harus diisi')
        );


        if ($valid->run() === FALSE) {
            //End Validasi Bro

            $data = array(
                'title'                 => 'Profil Saya',
                'pelanggan'             => $pelanggan,
                'isi'                   => 'dashboard/profile'
            );
            $this->load->view('layout/wrapper', $data, FALSE);

            //Masuk Databasenya Bro
        } else {
            $i = $this->input;
            //Kalau Password lebih dari 6 karakter maka password diganti
            if (strlen($i->post('password')) >= 6) {
                $data = array(
                    'id_pelanggan'          => $id_pelanggan,
                    'nama_pelanggan'        => $i->post('nama_pelanggan'),
                    'password'              => SHA1($i->post('password')),
                    'telephone'             => $i->post('telephone'),
                    'alamat'                => $i->post('alamat')
                );
            } else {
                //Kalo Passwordnya kurang dari 6 maka password gak diganti
                $data = array(
                    'id_pelanggan'          => $id_pelanggan,
                    'nama_pelanggan'        => $i->post('nama_pelanggan'),
                    'telephone'             => $i->post('telephone'),
                    'alamat'                => $i->post('alamat')
                );
            }
            //End data update
            $this->m_pelanggan->edit($data);
            $this->session->set_flashdata('sukses', 'Selamat Update Profil Anda Telah Berhasil! :)');
            redirect(base_url('dashboard/profile'), 'refresh');
        }
        //End Masuk Database Bro!
    }
    //Konfirmasi Pembayaran
    public function konfirmasi($kode_transaksi)
    {
        $header_transaksi   = $this->m_header_transaksi->kode_transaksi($kode_transaksi);
        $rekening           = $this->m_rekening->listing();

        //Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_bank',
            'Nama Bank',
            'required',
            array('required'    => '%s harus diisi')
        );
        $valid->set_rules(
            'rek_pembayaran',
            'Nomor Rekening',
            'required',
            array(
                'required'    => '%s harus diisi'
            )
        );
        $valid->set_rules(
            'rek_pelanggan',
            'Nama Pemilik Rekening',
            'required',
            array(
                'required'    => '%s harus diisi'
            )
        );
        $valid->set_rules(
            'tanggal_bayar',
            'Tanggal Pembayaran',
            'required',
            array(
                'required'    => '%s harus diisi'
            )
        );
        $valid->set_rules(
            'jumlah_bayar',
            'Jumlah Pembayaran',
            'required',
            array(
                'required'    => '%s harus diisi'
            )
        );

        if ($valid->run()) {
            //Check jika gambar diganti
            if (!empty($_FILES['bukti_bayar']['name'])) {

                $config['upload_path'] = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2400';
                $config['max_width'] = '2024';
                $config['max_height'] = '2024';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bukti_bayar')) {
                    //End Validasi Bro

                    $data = array(
                        'title'                 => 'Konfirmasi Pembayaran',
                        'header_transaksi'      => $header_transaksi,
                        'rekening'              => $rekening,
                        'error'                 => $this->upload->display_errors(),
                        'isi'                   => 'dashboard/konfirmasi'
                    );
                    $this->load->view('layout/wrapper', $data, FALSE);
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
                        'id_header_transaksi'           => $header_transaksi->id_header_transaksi,
                        'status_bayar'                  => 'Konfirmasi',
                        'jumlah_bayar'                  => $i->post('jumlah_bayar'),
                        'rek_pembayaran'                => $i->post('rek_pembayaran'),
                        'rek_pelanggan'                 => $i->post('rek_pelanggan'),
                        'bukti_bayar'                   => $upload_gambar['upload_data']['file_name'],
                        'id_rekening'                   => $i->post('id_rekening'),
                        'tanggal_bayar'                 => $i->post('tanggal_bayar'),
                        'nama_bank'                     => $i->post('nama_bank')
                    );
                    $this->m_header_transaksi->edit($data);
                    $this->session->set_flashdata('sukses', 'Selamat Konfirmasi Pembayaran Berhasil :)');
                    redirect(base_url('dashboard'), 'refresh');
                }
            } else {
                //Edit Produk tanpa ganti gambar
                $i = $this->input;
                $data = array(
                    'id_header_transaksi'           => $header_transaksi->id_header_transaksi,
                    'status_bayar'                  => 'Konfirmasi',
                    'jumlah_bayar'                  => $i->post('jumlah_bayar'),
                    'rek_pembayaran'                => $i->post('rek_pembayaran'),
                    'rek_pelanggan'                 => $i->post('rek_pelanggan'),
                    'id_rekening'                   => $i->post('id_rekening'),
                    'tanggal_bayar'                 => $i->post('tanggal_bayar'),
                    'nama_bank'                     => $i->post('nama_bank')
                );
                $this->m_header_transaksi->edit($data);
                $this->session->set_flashdata('sukses', 'Selamat Konfirmasi Pembayaran Berhasil :)');
                redirect(base_url('dashboard'), 'refresh');
            }
        }
        //End Masuk Database Bro!
        $data = array(
            'title'                 => 'Konfirmasi Pembayaran',
            'header_transaksi'      => $header_transaksi,
            'rekening'              => $rekening,
            'isi'                   => 'dashboard/konfirmasi'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
