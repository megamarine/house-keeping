<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi','trans');
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
            'conten' => 'conten_usr/trans_pinjam',
            'pinjam' => $this->trans->pinjam(),
            'footer_js' => [
                'assets/js/trans.js',
            ],
            
        ];
        $this->load->view('template_usr/conten', $data);
    }

    function pinjam() {
        $rfid_input = $this->input->post('rfid');
        $cek = $this->trans->cek_pinjam($rfid_input);
        $dk = $this->trans->data_kar($rfid_input);
        foreach ($dk->result() as $row) {
            $rfid = $row->rfid_no;
            $stts = $row->status;
        }
        foreach ($this->trans->cek_trans($rfid_input)->result() as $row) {
            $sts_trans = $row->status;
        }
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
        redirect('index.php/user/transaksi');
    }

    function vkembali() {
        $data = [
            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Transaksi Kembali',
            'conten' => 'conten_usr/trans_kembali',
            'pinjam' => $this->trans->pinjam(),
            'kembali' => $this->trans->kembali(),
            'footer_js' => [
                'assets/js/trans.js',
            ],
            
        ];
        $this->load->view('template_usr/conten', $data);
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
        $tgl_kembali = date('Y-m-d H:i:s');
        $stat = 2;
        // $data = [
        //     'tgl_kembali' => date('Y-m-d H:i:s'),
        //     'status' => 2,
        //     'date_kembali' => date('Y-m-d'),
        // ];
        $arr = array('rfid_no' => $rfid_input);
        // 'tgl_pinjam >=' => $datecek
        $where = $arr;
        if ($tgl_cek != null) {
            $this->session->set_flashdata('cek', 'Dilakukan');
        }elseif ($tgl_pjm != $datecek && $tgl_cek_sblm == null) {
            // $this->m_data->update_data($table,$data,$where);
            $this->m_data->kembali($rfid_input, $tgl_kembali, $datecek, $stat);
            $this->session->set_flashdata('kembali', 'Dikembalikan');
        }else {
            // $this->m_data->update_data($table,$data,$where);
            $this->m_data->kembali($rfid_input, $tgl_kembali, $datecek, $stat);
            $this->session->set_flashdata('kembali', 'Dikembalikan');
        }
        redirect('index.php/user/transaksi/vkembali');
    }

    // function rekap_transaksi() {
    //     $data = [
    //         // 'name'    => $this->session->userdata('nama'),
    //         'title' => 'Rekap Transaksi',
    //         'conten' => 'conten/rekap_transaksi',
    //         'rekap' => $this->trans->rekap_trans(),
    //         'footer_js' => [
    //             'assets/js/trans.js',
    //         ],
            
    //     ];
    //     $this->load->view('template/conten', $data);
    // }

}
