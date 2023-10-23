<?php
class M_Dashboard extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  function pinjam_hari()  {
    return $this->db->query("SELECT tgl_pinjam FROM tbl_transaksi where tgl_pinjam >= date(now())")->num_rows();
  }

  function kembali_hari() {
    return $this->db->query("SELECT tgl_kembali FROM tbl_transaksi where tgl_pinjam >= date(now())")->num_rows();
  }

  function pinjam_bln() {
    return $this->db->query("SELECT tgl_pinjam FROM tbl_transaksi where tgl_pinjam >= month(now())")->num_rows();
  }

  function kembali_bln() {
    return $this->db->query("SELECT tgl_kembali FROM tbl_transaksi where tgl_kembali >= month(now())")->num_rows();
  }

}