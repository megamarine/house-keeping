<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Company extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {

        //     redirect(base_url("login"));
        // }
    }


    public function index()

    {
        $data = [

            // 'name'    => $this->session->userdata('nama'),
            'title' => 'Master Company',
            'conten' => 'conten/company',
            'company' => $this->m_data->get_data('tbl_master_company'),
        ];

        $this->load->view('template/conten', $data);
    }
    function update_data($id)  {
        $table = 'tbl_master_company';
        $data = [
            'name' => $this->input->post('companyName'),
            'aliases' => $this->input->post('companyAliases')
        ];
        $where = array('id' => $id);
        $this->m_data->update_data($table,$data,$where);
        redirect('index.php/company');
    }
}
