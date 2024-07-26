<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_master', 'master');

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {

        //     redirect(base_url("login"));
        // }
    }


    public function index2()

    {
        $data = [

            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Master Empployee',
            'subtitle' => 'Employee List',
            'titleform' => 'Tambah Data',
            'conten' => 'conten/employee',
            'employee' => $this->master->list_kar(),
            'footer_js' => [
                'assets/js/employee.js',
            ],
            'bagian' => $this->m_data->get_data('tbl_master_bagian'),
        ];

        $this->load->view('template/conten', $data);
    }

    function tambah_data() {

        // $id_kar = $this->input->post('idkar');

        // $cek = $this->master->cek_karyawan($id_kar);
        $this->form_validation->set_rules('idkar', 'ID Karyawan', 'is_unique[tbl_master_karyawan.no_badge]');
        if ($this->form_validation->run() == FALSE) {
            // echo '<h1>DATA SUDAH ADA</h1>';
            // echo '<a href="index.php/Employee">Visit W3Schools</a>';
            $this->index();
            // $this->session->set_flashdata('cek', 'Sudah ada');
        }else {
            $table = 'tbl_master_karyawan';
            $data = [
                'no_badge' => $this->input->post('idkar'),
                'name' => $this->input->post('namakar'),
                'rfid_no' => $this->input->post('rfidno'),
                'bagian_id' => $this->input->post('bagian')
            ];
            $this->m_data->simpan_data($table,$data);
            $this->session->set_flashdata('add', 'Disimpan');
            redirect('index.php/Employee/em_newload');
        }

       
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
        redirect('index.php/employee/em_newload');
    }

    function nonaktif($id)  {
        $table = 'tbl_master_karyawan';
        $data = [
            'status' => 0
        ];
        $where = array('id'=> $id);
        $this->m_data->update_data($table,$data,$where);
        $this->session->set_flashdata('add', 'Dinonaktifkan');
        redirect('index.php/employee/em_newload');
    }


    public function index()

    {
        $data = [

            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Master Empployee',
            'subtitle' => 'Employee List',
            'titleform' => 'Tambah Data',
            'conten' => 'employee/index',
            'employee' => $this->master->list_kar(),
            'footer_js' => [
                'assets/js/employee.js',
            ],
            'bagian' => $this->m_data->get_data('tbl_master_bagian'),
        ];

        $this->load->view('template/conten', $data);
    }

    function tableEm()
    {
        $data['emp_list'] =  $this->master->list_kar()->result();
        echo json_encode($this->load->view('employee/table-em',$data, false));
    }

    function store()
    {
        $this->form_validation->set_rules('idkar', 'ID Karyawan', 'is_unique[tbl_master_karyawan.no_badge]');

        $id = $this->input->post('id');
        if ($id != null) {
            $table = 'tbl_master_karyawan';
            $dataupdate = [
                'no_badge' => $this->input->post('idkar'),
                'name' => $this->input->post('namakar'),
                'rfid_no' => $this->input->post('rfidno'),
                'bagian_id' => $this->input->post('bagian')
            ];
            $where = array('id' => $id);
            $this->m_data->update_data($table, $dataupdate, $where);
            echo json_encode(['status' => 'updated']);
            // echo json_encode($data);
        } else {
            if ($this->form_validation->run() == FALSE) {
                if (form_error('idkar')) {
                    echo json_encode(['status' => 'exists']);
                } else {
                    echo json_encode(['status' => 'validation_failed']);
                }
            }else {
                $table = 'tbl_master_karyawan';
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
    }

    function vedit($id)
    {
        $table = 'tbl_master_karyawan';
        $where = array('id' => $id);
        $data = $this->m_data->get_data_by_id($table, $where)->row();
        echo json_encode($data);
    }

    function delete($id)  {
        $table = 'tbl_master_karyawan';
        $where = array('id'=>$id);
        $this->m_data->hapus_data($table,$where);
    }
    

}
