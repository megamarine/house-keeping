<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi','trans');

    }


    public function index()

    {
        $data = [

            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Report',
            'conten' => 'conten_hk/vreport',
            'bagian' => $this->m_data->get_data('tbl_master_bagian'),
        ];

        $this->load->view('template_hk/conten', $data);
    }

    function export_with_filter() {
        $tgl_awal = $this->input->post('date_start');
        $tgl_akhir = $this->input->post('date_end');
        $status = $this->input->post('status');
        $bag =  $this->input->post('bagian');

        // die(var_dump($tgl_awal, $tgl_akhir,$status));

        $title = 'Report APD';
        $export = $this->trans->report2($tgl_awal,$tgl_akhir,$status,$bag);
        // die(var_dump($export));
        $data = [
            'title' => $title,
            'data' => $export
        ];
        $name = $title;
        $this->load->library('pdf');
        $html = $this->load->view('conten_hk/report', $data, true);
        $this->pdf->createPDF($html, $name, false);
    }
}
