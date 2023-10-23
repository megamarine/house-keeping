<?php
class M_Dashboard extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  function pinjam_hari()  {
    return $this->db->query("SELECT * FROM tbl_transaksi tt where status = '1' and tgl_pinjam >= date(now())")->num_rows();
  }

  function kembali_hari() {
    return $this->db->query("SELECT * FROM tbl_transaksi tt where status = '2' and tgl_pinjam >= date(now())")->num_rows();
  }

}