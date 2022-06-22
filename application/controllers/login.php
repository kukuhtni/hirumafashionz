<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    //Halaman Login
    public function index()
    {
        //Validasi
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required',
            array('required' => '%s harus diisi')
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s harus diisi')
        );

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //Proses Ke Simple Login
            $this->simple_login->login($username, $password);
        }
        //End Validasi

        $data = array('title' => 'Login Admin Hiruma');
        $this->load->view('login/list', $data, FALSE);
    }
    //Fungsi Logout
    public function logout()
    {
        //Ambil Fungsi Logout Dari Simple_Login
        $this->simple_login->logout();
    }

    
}
