<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    //Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_header_transaksi');
        $this->load->model('m_rekening');
        $this->load->model('m_konfigurasi');
        //Proteksi halaman
        $this->simple_login->cek_login();
    }

    // Data User
    public function index()
    {
        $header_transaksi  = $this->m_header_transaksi->listing();

        // $user = $this->m_user->listing();
        $data = array(
            'title' => 'Data Transaksi',
            'header_transaksi' => $header_transaksi,
            'isi' => 'admin/transaksi/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Detail
    public function detail($kode_transaksi)
    {
        $header_transaksi   = $this->m_header_transaksi->kode_transaksi($kode_transaksi);
        $transaksi          = $this->m_transaksi->kode_transaksi($kode_transaksi);
        $data = array(
            'title'                 => 'Riwayat Belanja',
            'header_transaksi'      => $header_transaksi,
            'transaksi'             => $transaksi,
            'isi'                   => 'admin/transaksi/detail'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    //Cetak
    public function cetak($kode_transaksi)
    {
        $header_transaksi   = $this->m_header_transaksi->kode_transaksi($kode_transaksi);
        $transaksi          = $this->m_transaksi->kode_transaksi($kode_transaksi);
        $site               = $this->m_konfigurasi->listing();
        $data = array(
            'title'                 => 'Riwayat Belanja',
            'header_transaksi'      => $header_transaksi,
            'transaksi'             => $transaksi,
            'site'                  => $site
        );
        $this->load->view('admin/transaksi/cetak', $data, FALSE);
    }

    //Cetak PDF
    public function pdf($kode_transaksi)
    {
        $header_transaksi   = $this->m_header_transaksi->kode_transaksi($kode_transaksi);
        $transaksi          = $this->m_transaksi->kode_transaksi($kode_transaksi);
        $site               = $this->m_konfigurasi->listing();
        $data = array(
            'title'                 => 'Riwayat Belanja',
            'header_transaksi'      => $header_transaksi,
            'transaksi'             => $transaksi,
            'site'                  => $site
        );
        $html               = $this->load->view('admin/transaksi/cetak', $data, true);
        // Create an instance of the class:
        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output a PDF file directly to the browser
        $nama_file_pdf = url_title($site->namaweb, 'dash', 'true') . '-' . $kode_transaksi . '.pdf';
        $mpdf->Output($nama_file_pdf, 'I');
    }

    //Pengiriman
    public function kirim($kode_transaksi)
    {
        $header_transaksi   = $this->m_header_transaksi->kode_transaksi($kode_transaksi);
        $transaksi          = $this->m_transaksi->kode_transaksi($kode_transaksi);
        $site               = $this->m_konfigurasi->listing();
        $data = array(
            'title'                 => 'Riwayat Belanja',
            'header_transaksi'      => $header_transaksi,
            'transaksi'             => $transaksi,
            'site'                  => $site
        );
        $html               = $this->load->view('admin/transaksi/kirim', $data, true);


        //Load Fungsi MPDF
        // Create an instance of the class:
        $mpdf = new \Mpdf\Mpdf();
        //Setting Header Dan Footer
        $mpdf->SetHTMLHeader('
        <div style="text-align: left; font-weight: bold;">
            <img src="' . base_url('assets/upload/image/' . $site->logo) . '" style="height: 50px; width: auto;">
        </div>');
        $mpdf->SetHTMLFooter('
            <div style="padding:10px 20px; background-color: red; color: white; font-size: 12px;">
            Alamat: ' . $site->namaweb . ' (' . $site->alamat . ')<br>
            Nomor Telephone/HP: ' . $site->telephone . '
            </div>

        ');
        //End Setting Header Dan Footer

        // Write some HTML code:
        $mpdf->WriteHTML($html);

        // Output tampil dengan nama baru
        $nama_file_pdf = url_title($site->namaweb, 'dash', 'true') . '-' . $kode_transaksi . '.pdf';
        $mpdf->Output($nama_file_pdf, 'I');
    }
}
