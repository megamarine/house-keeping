<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_master','master');

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {

        //     redirect(base_url("login"));
        // }
    }


    public function index()

    {
        $data = [

            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Master Empployee',
            'subtitle' => 'Employee List',
            'conten' => 'conten_hk/employee',
            'employee' => $this->master->list_kar(),
            'footer_js' => [
                'assets/js/employee.js',
            ],
            'bagian' => $this->m_data->get_data('tbl_master_bagian'),
        ];

        $this->load->view('template_hk/conten', $data);
    }

    function tambah_data() {
        $table = 'tbl_master_karyawan';
        $data = [
            'no_badge' => $this->input->post('idkar'),
            'name' => $this->input->post('namakar'),
            'rfid_no' => $this->input->post('rfidno'),
            'bagian_id' => $this->input->post('bagian')
        ];
        $this->m_data->simpan_data($table,$data);
        $this->session->set_flashdata('add', 'Disimpan');
        redirect('index.php/hk/Employee');
    }

    function update_data($id)  {
        $table = 'tbl_master_karyawan';
        $data = [
            'no_badge' => $this->input->post('idkar'),
            'name' => $this->input->post('namakar'),
            'rfid_no' => $this->input->post('rfidno')
        ];
        $where = array('id' => $id);
        $this->m_data->update_data($table,$data,$where);
        $this->session->set_flashdata('add', 'Diubah');
        redirect('index.php/hk/employee');
    }

    function nonaktif($id)  {
        $table = 'tbl_master_karyawan';
        $data = [
            'status' => 0
        ];
        $where = array('id'=> $id);
        $this->m_data->update_data($table,$data,$where);
        $this->session->set_flashdata('add', 'Dinonaktifkan');
        redirect('index.php/hk/employee');
    }
}
