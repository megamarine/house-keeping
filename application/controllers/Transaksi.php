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


    public function index2()

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

    function index() {
        $data = [
            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Transaksi Pinjam',
            'conten' => 'pinjam/index',
            'footer_js' => [
                'assets/js/pinjam.js',
                // 'assets/js/trans.js',
            ],
            
        ];
        $this->load->view('template/conten', $data);
    }

    function tablePinjam()
    {
        $data['pinjam_list'] =  $this->trans->pinjam()->result();
        echo json_encode($this->load->view('pinjam/table-pinjam', $data, false));
    }

    function pinjam2() {
        $rfid_input = $this->input->post('rfid');
        $dk = $this->trans->data_kar($rfid_input);
        $rfid = null;
        $stts = null;
        if ($dk->num_rows() > 0) {
            $row = $dk->row();
            $rfid = $row->rfid_no;
            $stts = $row->status;
        }
        $cek = $this->trans->cek_pinjam($rfid_input);
        $sts_trans = 0;
        $cek_trans = $this->trans->cek_trans($rfid_input);
        if ($cek_trans->num_rows() > 0) {
            $row = $cek_trans->row();
            $sts_trans = $row->status;
        }
        $id = $this->input->post('id');
        if ($id != null) {
            $table = 'tbl_transaksi';
            $dataupdate = [
                'rfid_no' => $rfid_input,
                'item_id' => 1,
                'tgl_pinjam' => date('Y-m-d H:i:s'),
                'status' => 1,
                'date_pinjam' => date('Y-m-d'),
            ];
            $where = array('id' => $id);
            $this->m_data->update_data($table, $dataupdate, $where);
            echo json_encode(['alert' => 'updated']);
            // echo json_encode($data);
        } else {
            $table = 'tbl_transaksi';
            $data = [
                'rfid_no' => $rfid_input,
                'item_id' => 1,
                'tgl_pinjam' => date('Y-m-d H:i:s'),
                'status' => 1,
                'date_pinjam' => date('Y-m-d'),
            ];
            if ($rfid == null || $stts != 1) {
                echo json_encode(['alert' => 'cekdata']);
            }elseif ($sts_trans == 1) {
                echo json_encode(['alert' => 'cekstatus']);
            }elseif ($cek > 0) {
                echo json_encode(['alert' => 'cektrans']);
            }else {
                $this->m_data->simpan_data($table,$data);
                echo json_encode(['alert' => 'saved']);
            }
           
        }
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
        redirect('index.php/transaksi/trans_pinjam');
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

    function vkembali2() {
        $data = [
            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Transaksi Kembali',
            'conten' => 'kembali/index',
            'kembali' => $this->trans->kembali(),
            'footer_js' => [
                // 'assets/js/trans.js',
                'assets/js/kembali.js',
            ],
            
        ];
        $this->load->view('template/conten', $data);
    }

    function tableKembali()
    {
        $data['kembali_list'] =  $this->trans->kembali()->result();
        echo json_encode($this->load->view('kembali/table-kembali',$data, false));
    }

    function kembali() {
        $rfid_input = $this->input->post('rfid');
        $cek = $this->trans->cek_kembali($rfid_input);
        $rfid = null;
        $stts = null;
        if ($cek->num_rows() > 0) {
            $row = $cek->row();
            $tgl_cek = $row->tgl_kembali;
        }
        $cek_sebelum = $this->trans->cek_kembali_sebelum($rfid_input);
        if ($cek_sebelum->num_rows() > 0) {
            $row = $cek_sebelum->row();
            $tgl_cek_sblm = $row->tgl_kembali;
            $tgl_pjm = $row->tgl_pinjam;
        }
        $datecek = date('Y-m-d');
        $tgl_kembali = date('Y-m-d H:i:s');
        $stat = 2;        
        $table = 'tbl_transaksi';
        $tgl_kembali = date('Y-m-d H:i:s');
        $stat = 2;  
        $arr = array('rfid_no' => $rfid_input);
        $where = $arr;
        if ($tgl_cek != null) {
            // $this->session->set_flashdata('cek', 'Dilakukan');
            echo json_encode(['alert' => 'cek']);
        }elseif ($tgl_pjm != $datecek && $tgl_cek_sblm == null) {
            // $this->m_data->update_data($table,$data,$where);
            $this->m_data->kembali($rfid_input, $tgl_kembali, $datecek, $stat);
            // $this->session->set_flashdata('kembali', 'Dikembalikan');
            echo json_encode(['alert' => 'updated']);
        }else {
            // $this->m_data->update_data($table,$data,$where);
            $this->m_data->kembali($rfid_input, $tgl_kembali, $datecek, $stat);
            echo json_encode(['alert' => 'updated']);
        }
    }

    function kembali_old() {
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
        redirect('index.php/transaksi/vkembali');
    }

    function rekap_transaksi_old() {
        $data = [
            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Rekap Transaksi',
            'conten' => 'conten/rekap_transaksi',
            // 'rekap' => $this->trans->rekap_trans(),
            'footer_js' => [
                'assets/js/trans.js',
            ],
            
        ];
        $this->load->view('template/conten', $data);
    }

    function rekap_transaksi() {
        $data = [
            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Rekap Transaksi',
            'conten' => 'rekap_trans/index',
            // 'rekap' => $this->trans->rekap_trans(),
            'footer_js' => [
                'assets/js/transaksi.js',
            ],
            
        ];
        $this->load->view('template/conten', $data);
    }

    function tableRekapTrans()
    {
        $data['rekap_trans_list'] =  $this->trans->rekap_trans()->result();
        echo json_encode($this->load->view('rekap_trans/table-rekap-trans',$data, false));
    }

    function store()
    {

        $id = $this->input->post('id');
        if ($id != null) {
            $table = 'tbl_transaksi';
            $dataupdate = [
                'tgl_kembali' => date('Y-m-d H:i:s', strtotime($this->input->post('tgl_kembali'))),
                'status' => 2,
                'keterangan' => $this->input->post('keterangan')
            ];
            $where = array('id' => $id);
            $this->m_data->update_data($table, $dataupdate, $where);
            echo json_encode(['status' => 'updated']);
            // echo json_encode($data);
        } else {
            $table = 'tbl_transaksi';
            $data = [
                'no_badge' => $this->input->post('idkar'),
                'name' => $this->input->post('namakar'),
                'rfid_no' => $this->input->post('rfidno'),
                'bagian_id' => $this->input->post('bagian')
            ];
            $this->m_data->simpan_data($table, $data);
            // $this->session->set_flashdata('add', 'Disimpan');
            echo json_encode(['status' => 'saved']);
        }
    }

    function vedit($id)
    {
        $table = 'tbl_transaksi';
        $where = array('id' => $id);
        $data = $this->m_data->get_data_by_id($table, $where)->row();
        echo json_encode($data);
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


}
