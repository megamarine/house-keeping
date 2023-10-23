<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Dashboard','dash');

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {

        //     redirect(base_url("login"));
        // }
    }


    public function index()

    {
        $data = [

            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Dashboard',
            'conten' => 'conten/dashboard',
            'pinjam_hari' => $this->dash->pinjam_hari(),
            'kembali_hari' => $this->dash->kembali_hari()
        ];

        $this->load->view('template/conten', $data);
    }
}
