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

}