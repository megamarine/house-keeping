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
        $table = 'tbl_transaksi';
        $data = [
            'rfid_no' => $rfid_input,
            'item_id' => 1,
            'tgl_pinjam' => date('Y-m-d h:i:s'),
            'status' => 1
        ];
        if ($cek > 0) {
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
            'kembali' => $this->m_data->get_data('tbl_transaksi'),
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
        $datecek = date('Y-m-d');
        // return var_dump($cek);
        $table = 'tbl_transaksi';
        $data = [
            'tgl_kembali' => date('Y-m-d h:i:s'),
            'status' => 2
        ];
        $arr = array('rfid_no' => $rfid_input, 'tgl_pinjam >=' => $datecek);
        $where = $arr;
        if ($tgl_cek != null) {
            $this->session->set_flashdata('cek', 'Dilakukan');
        }else {
            $this->m_data->update_data($table,$data,$where);
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