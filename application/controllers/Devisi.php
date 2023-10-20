<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Devisi extends CI_Controller
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
            'title' => 'Master Devisi',
            'subtitle' => 'Devisi List',
            'conten' => 'conten/devisi',
            'dev' => $this->m_data->get_data('tbl_master_devisi')
        ];

        $this->load->view('template/conten', $data);
    }

}
