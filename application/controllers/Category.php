<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Category extends CI_Controller
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
            'title' => 'Master Category',
            'subtitle' => 'Category List',
            'conten' => 'conten/category',
            'company' => $this->m_data->get_data('tbl_master_company'),
            'categ' => $this->master->data_categ(),
        ];

        $this->load->view('template/conten', $data);
    }

    function tambah_data() {
        $table = 'tbl_master_category';
        $data = [
            'nama_kategori' => $this->input->post('categoryName'),
            'company_id' => $this->input->post('company_id')
        ];
        $this->m_data->simpan_data($table,$data);
        redirect('index.php/category');
    }
}
