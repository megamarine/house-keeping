<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Master extends CI_Controller
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
            'title' => 'Master',
            'conten' => 'conten_hk/master',
        ];

        $this->load->view('template_hk/conten', $data);
    }
}
