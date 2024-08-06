<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Bagian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {

        //     redirect(base_url("login"));
        // }
    }


    public function index()

    {
        $data = [

            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Master Bagian',
            'conten' => 'conten/bagian',
            'subtitle' => 'Data List',
            'devisi' => $this->m_data->get_data('tbl_master_devisi'),
            'bagian' => $this->m_data->get_data('tbl_master_bagian'),
        ];

        $this->load->view('template/conten', $data);
    }
}
