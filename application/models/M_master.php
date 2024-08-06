<?php
class M_master extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  function data_categ()  {
    return $this->db->query("SELECT tmc.id, tmc.nama_kategori, tmc2.aliases FROM tbl_master_category tmc
    JOIN tbl_master_company tmc2 on tmc2.id = tmc.company_id ");
  }

  function data_item() {
    return $this->db->query("SELECT
      a.id,
      a.item_name,
      a.deskripsi,
      b.nama_kategori,
      c.aliases
    from
      tbl_master_item a
    join tbl_master_category b on
      b.id = a.categ_id
    join tbl_master_company c on
      c.id = b.company_id");
  }

  function list_kar()  {
    return $this->db->query("SELECT
      tmk.id,
      tmk.no_badge,
      tmk.name,
      tmk.rfid_no,
      tmk.bagian_id,
      tmb.nama_bagian,
      tmk.status
    FROM
      tbl_master_karyawan tmk
    JOIN tbl_master_bagian tmb on
      tmb.id = tmk.bagian_id");
  }

  function cek_karyawan($id_kar)  {
    return $this->db->query("SELECT no_badge FROM tbl_master_karyawan where no_badge = '$id_kar'");
  }

}