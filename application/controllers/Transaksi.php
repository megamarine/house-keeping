<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi','trans');
        // $this->load->library('pdf');
        date_default_timezone_set('Asia/Jakarta');

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {

        //     redirect(base_url("login"));
        // }
    }


    public function index()

    {
        $data = [
            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Transaksi Pinjam',
            'conten' => 'conten/trans_pinjam',
            'pinjam' => $this->trans->pinjam(),
            'footer_js' => [
                'assets/js/trans.js',
            ],
            
        ];
        $this->load->view('template/conten', $data);
    }

    function pinjam() {
        $rfid_input = $this->input->post('rfid');
        $dk = $this->trans->data_kar($rfid_input);
        foreach ($dk->result() as $row) {
            $rfid = $row->rfid_no;
            $stts = $row->status;
        }
        foreach ($this->trans->cek_trans($rfid_input)->result() as $row) {
            $sts_trans = $row->status;
        }
        $cek = $this->trans->cek_pinjam($rfid_input);
        $table = 'tbl_transaksi';
        $data = [
            'rfid_no' => $rfid_input,
            'item_id' => 1,
            'tgl_pinjam' => date('Y-m-d H:i:s'),
            'status' => 1,
            'date_pinjam' => date('Y-m-d'),
        ];
        if ($rfid == null || $stts != 1) {
            $this->session->set_flashdata('cekdata', 'Ditemukan / Dinonaktifkan');
        }elseif ($sts_trans == 1) {
            $this->session->set_flashdata('cektrans', 'Belum Lunas');
        }elseif ($cek > 0) {
            $this->session->set_flashdata('cek', 'Dilakukan');
        }else {
            $this->m_data->simpan_data($table,$data);
            $this->session->set_flashdata('trans', 'Disimpan');
        }
        redirect('index.php/transaksi');
    }

    function vkembali() {
        $data = [
            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Transaksi Kembali',
            'conten' => 'conten/trans_kembali',
            'pinjam' => $this->trans->pinjam(),
            'kembali' => $this->trans->kembali(),
            'footer_js' => [
                'assets/js/trans.js',
            ],
            
        ];
        $this->load->view('template/conten', $data);
    }

    function kembali() {
        $rfid_input = $this->input->post('rfid');
        $cek = $this->trans->cek_kembali($rfid_input);
        foreach ($cek->result() as $row) {
            $tgl_cek = $row->tgl_kembali;
        }
        $cek_sebelum = $this->trans->cek_kembali_sebelum($rfid_input);
        foreach ($cek_sebelum->result() as $row) {
            $tgl_cek_sblm = $row->tgl_kembali;
            $tgl_pjm = $row->tgl_pinjam;
        }
        $datecek = date('Y-m-d');
        // return var_dump($cek);
        $table = 'tbl_transaksi';
        $data = [
            'tgl_kembali' => date('Y-m-d H:i:s'),
            'status' => 2,
            'date_kembali' => date('Y-m-d'),
        ];
        $arr = array('rfid_no' => $rfid_input);
        // 'tgl_pinjam >=' => $datecek
        $where = $arr;
        if ($tgl_cek != null) {
            $this->session->set_flashdata('cek', 'Dilakukan');
        }elseif ($tgl_pjm != $datecek && $tgl_cek_sblm == null) {
            $this->m_data->update_data($table,$data,$where);
            $this->session->set_flashdata('kembali', 'Dikembalikan');
        }else {
            $this->m_data->update_data($table,$data,$where);
            $this->session->set_flashdata('kembali', 'Dikembalikan');
        }
        redirect('index.php/transaksi/vkembali');
    }

    function rekap_transaksi() {
        $data = [
            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Rekap Transaksi',
            'conten' => 'conten/rekap_transaksi',
            'rekap' => $this->trans->rekap_trans(),
            'footer_js' => [
                'assets/js/trans.js',
            ],
            
        ];
        $this->load->view('template/conten', $data);
    }

    function update_last_trans($id) {
        $table = 'tbl_transaksi';
        $data = [
            'tgl_kembali' => date('Y-m-d H:i:s', strtotime($this->input->post('tgl_kembali'))),
            'status' => 2,
            'keterangan' => $this->input->post('keterangan')
        ];
        $where = array('id' => $id);
        $this->m_data->update_data($table,$data,$where);
        $this->session->set_flashdata('kembali', 'Dikembalikan');
        redirect('index.php/transaksi/rekap_transaksi');
    }

    function pdf() {
        $bln = $this->input->post('bulan');
        $thn = $this->input->post('tahun');
        if ($bln == '01') {
           $convert = "Januari";
        }elseif ($bln == '02') {
            $convert = "Februari";
        }elseif ($bln == '03') {
            $convert = "Maret";
        }elseif ($bln == '04') {
            $convert = "April";
        }elseif ($bln == '05') {
            $convert = "Mei";
        }elseif ($bln == '06') {
            $convert = "Juni";
        }elseif ($bln == '07') {
            $convert = "Juli";
        }elseif ($bln == '08') {
            $convert = "Agustus";
        }elseif ($bln == '09') {
            $convert = "September";
        }elseif ($bln == '10') {
            $convert = "Oktober";
        }elseif ($bln == '11') {
            $convert = "November";
        }else {
            $convert = "Desember";
        }
        $data = [
            'title' => 'Report APD - '.$convert.' '.$thn,
            'data' => $this->trans->report($bln,$thn)
        ];
        $name = 'Report APD - '.$convert.' '.$thn;
        $this->load->library('pdf');
        $html = $this->load->view('conten/report', $data, true);
        $this->pdf->createPDF($html, $name, false);
    }

    function pdf_bydate() {
        $tgl_start = $this->input->post('date_start');
        $tgl_end = $this->input->post('date_end');
        $data = [
            'title' => 'Report APD - '. date('d/m/Y', strtotime($tgl_start)) .' sampai '.date('d/m/Y', strtotime($tgl_end)),
            'data' => $this->trans->report_date_between($tgl_start,$tgl_end)
        ];
        $name = 'Report APD - '.date('d/m/Y', strtotime($tgl_start)) .' sampai '.date('d/m/Y', strtotime($tgl_end));
        $this->load->library('pdf');
        $html = $this->load->view('conten/report', $data, true);
        $this->pdf->createPDF($html, $name, false);
    }

    function pdf_status() {
        $status = $this->input->post('status');
        if ($status = 1) {
            $sts = 'Belum Lunas';
        }else {
            $sts = 'Lunas';
        }
        $data = [
            'title' => 'Report APD - '. $sts,
            'data' => $this->trans->report_by_status($status)
        ];
        $name = 'Report APD - '. $sts;
        $this->load->library('pdf');
        $html = $this->load->view('conten/report', $data, true);
        $this->pdf->createPDF($html, $name, false);
    }

    function export_with_filter() {
        $tgl_awal = $this->input->post('date_start');
        $tgl_akhir = $this->input->post('date_end');
        $status = $this->input->post('status');
        if ($status = 1) {
            $sts = 'Belum Lunas';
        }else {
            $sts = 'Lunas';
        }

        $title = 'Report APD';
        $export = $this->trans->report_all_filter($tgl_awal,$tgl_akhir,$status);
        $data = [
            'title' => $title,
            'data' => $export
        ];
        $name = $title;
        $this->load->library('pdf');
        $html = $this->load->view('conten/report', $data, true);
        $this->pdf->createPDF($html, $name, false);
    }

}
