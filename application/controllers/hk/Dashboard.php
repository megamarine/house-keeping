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
        $day1 = $this->dash->pinjam_hari();
        $day2 = $this->dash->kembali_hari();
        $bln1 = $this->dash->pinjam_bln();
        $bln2 = $this->dash->kembali_bln();
        $data = [

            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Dashboard',
            'conten' => 'conten_hk/dashboard',
            'pinjam_hari' => $day1,
            'kembali_hari' => $day2,
            'total_day' => $day1 - $day2,
            'pinjam_bln' => $bln1,
            'kembali_bln' => $bln2,
            'total_bln' => $bln1 - $bln2
        ];

        $this->load->view('template_hk/conten', $data);
    }
}
