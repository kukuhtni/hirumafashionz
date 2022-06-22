<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Star_rating extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_star_rating');
    }

    function index()
    {
        $this->load->view('star_rating');
    }

    function fetch()
    {
        echo $this->m_star_rating->html_output();
    }

    function insert()
    {
        if ($this->input->post('business_id')) {
            $data = array(
                'business_id'  => $this->input->post('business_id'),
                'rating'   => $this->input->post('index')
            );
            $this->m_star_rating->insert_rating($data);
        }
    }
}
