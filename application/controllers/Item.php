<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Item extends CI_Controller
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
            'title' => 'Master Item',
            'subtitle' => 'Item List',
            'conten' => 'conten/item',
            'item' => $this->master->data_item(),
            'categ' => $this->master->data_categ(),
        ];

        $this->load->view('template/conten', $data);
    }

    function tambah_data() {
        $table = 'tbl_master_item';
        $data = [
            'item_name' => $this->input->post('itemName'),
            'deskripsi' => $this->input->post('deskripsi'),
            'categ_id' => $this->input->post('categ_id')
        ];
        $this->m_data->simpan_data($table,$data);
        redirect('index.php/item');
    }
}
