<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
        $this->load->model('m_konfigurasi');
        $this->load->model('m_pelanggan');
        $this->load->model('m_header_transaksi');
        $this->load->model('m_transaksi');
        //Load helper random string
        $this->load->helper('string');
    }
    //Halaman Belanja Website Hiruma
    public function index()
    {
        $keranjang = $this->cart->contents();

        $data = array(
            'title'         => 'Keranjang Belanja',
            'keranjang'     => $keranjang,
            'isi'           => 'belanja/list'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function sukses()
    {
        // $keranjang = $this->cart->contents();

        $data = array(
            'title'         => 'Selamat Anda Telah Berhasil Belanja',
            // 'keranjang'     => $keranjang,
            'isi'           => 'belanja/sukses'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    //checkout
    public function checkout()
    {
        //cek pelanggan sudah login apa belum? jika belum maka nanti harus registrasi
        //dan juga sekaligus login. mengecek dengan session email

        //kondisi sudah login
        if ($this->session->userdata('email')) {
            $email              = $this->session->userdata('email');
            $nama_pelanggan     = $this->session->userdata('nama_pelanggan');
            $pelanggan          = $this->m_pelanggan->sudah_login($email, $nama_pelanggan);

            $keranjang = $this->cart->contents();

            //Validasi Input
            $valid = $this->form_validation;

            $valid->set_rules(
                'nama_pelanggan',
                'Nama lengkap',
                'required',
                array('required'    => '%s harus diisi')
            );
            $valid->set_rules(
                'telephone',
                'Nomor telephone/hp',
                'required',
                array('required'    => '%s harus diisi')
            );
            $valid->set_rules(
                'alamat',
                'Alamat',
                'required',
                array('required'    => '%s harus diisi')
            );
            $valid->set_rules(
                'email',
                'Email',
                'required|valid_email',
                array(
                    'required'    => '%s harus diisi',
                    'valid_email' => '%s tidak valid'
                )
            );


            if ($valid->run() === FALSE) {
                //End Validasi Bro

                $data = array(
                    'title'         => 'Checkout',
                    'keranjang'     => $keranjang,
                    'pelanggan'     => $pelanggan,
                    'isi'           => 'belanja/checkout'
                );
                $this->load->view('layout/wrapper', $data, FALSE);
                //Masuk Database
            } else {
                $i = $this->input;
                $data = array(
                    'id_pelanggan'          => $pelanggan->id_pelanggan,
                    'nama_pelanggan'        => $i->post('nama_pelanggan'),
                    'email'                 => $i->post('email'),
                    'telephone'             => $i->post('telephone'),
                    'alamat'                => $i->post('alamat'),
                    'kode_transaksi'        => $i->post('kode_transaksi'),
                    'tanggal_transaksi'     => $i->post('tanggal_transaksi'),
                    'jumlah_transaksi'      => $i->post('jumlah_transaksi'),
                    'status_bayar'          => 'Belum',
                    'tanggal_post'        => date('Y-m-d H:i:s')
                );

                //Masuk ke header transaksi
                $this->m_header_transaksi->tambah($data);
                //Proses masuk ke tabel transaksi
                foreach ($keranjang as $keranjang) {
                    $sub_total = $keranjang['price'] * $keranjang['qty'];
                    $data = array(
                        'id_pelanggan'          => $pelanggan->id_pelanggan,
                        'kode_transaksi'        => $i->post('kode_transaksi'),
                        'id_produk'             => $keranjang['id'],
                        'harga'                 => $keranjang['price'],
                        'jumlah'                => $keranjang['qty'],
                        'total_harga'           => $sub_total,
                        'tanggal_transaksi'     => $i->post('tanggal_transaksi')

                    );
                    $this->m_transaksi->tambah($data);
                }

                //End proses masuk ke tabel transaksi
                //Setelah masuk ke tabel transaksi, maka keranjang dikosongkan lagi
                $this->cart->destroy();
                //End Pengososngan keranjang

                $this->session->set_flashdata('sukses', 'Selamat Checkout Anda Berhasil! :)');
                redirect(base_url('belanja/sukses'), 'refresh');
            }

            //End Masuk Database
        } else {
            //kalau belum maka harus registrasi
            $this->session->set_flashdata('sukses', 'Silahkan login atau registrasi terlebih dahulu');
            redirect(base_url('registrasi'), 'refresh');
        }
    }

    //Tambahkan Keranjang Belanja
    public function add()
    {
        //Ambil Data Dari Form
        $id             = $this->input->post('id');
        $qty            = $this->input->post('qty');
        $price          = $this->input->post('price');
        $name           = $this->input->post('name');
        $redirect_page  = $this->input->post('redirect_page');

        //Proses Memasukan ke keranjang belanja
        $data = array(
            'id'      => $id,
            'qty'     => $qty,
            'price'   => $price,
            'name'    => $name
        );
        $this->cart->insert($data);
        //Redirect Page
        redirect($redirect_page, 'refresh');
    }

    public function update_cart($rowid)
    {
        //Jika Ada rowid
        if ($rowid) {
            $data = array(
                'rowid'     => $rowid,
                'qty'       => $this->input->post('qty')
            );
            $this->cart->update($data);
            $this->session->set_flashdata('sukses', 'Data Keranjang Telah Diupdate');
            redirect(base_url('belanja'), 'refresh');
        } else {
            //Jika Gak Ada rowid
            redirect(base_url('belanja'), 'refresh');
        }
    }

    //Hapus semua isi keranjang
    public function hapus($rowid = '')
    {
        if ($rowid) {
            //Hapus per item
            $this->cart->remove($rowid);
            $this->session->set_flashdata('sukses', 'Data Keranjang Telah Dihapus');
            redirect(base_url('belanja'), 'refresh');
        } else {
            $this->cart->destroy();
            $this->session->set_flashdata('sukses', 'Data Keranjang Telah Dihapus');
            redirect(base_url('belanja'), 'refresh');
        }
    }
}
