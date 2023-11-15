<?php
class M_data extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  function get_data($table)
  {
    return $this->db->get($table);
  }
  function get_data_by_id($table, $where)
  {
    return $this->db->get_where($table, $where);
  }
  function simpan_data($table, $data)
  {
    $this->db->insert($table, $data);
  }
  function update_data($table, $data, $where)
  {
    $this->db->update($table, $data, $where);
  }
  function hapus_data($table, $where)
  {
    $this->db->delete($table, $where);
  }

  function update_trans($rfid, $tgl, $stat, $date_kem)  {
    return $this->db->query("UPDATE tbl_transaksi SET tgl_kembali = '$tgl', date_kembali = '$date_kem', status = $stat WHERE rfid_no = '$rfid' AND tgl_pinjam >= DATE(NOW())");
  }

  function kembali($rfid, $tgl_kembali, $date_kembali, $stat) {
    return $this->db->query("UPDATE tbl_transaksi SET tgl_kembali = '$tgl_kembali', date_kembali = '$date_kembali', status = '$stat' WHERE rfid_no = '$rfid' order by id desc limit 1");
  }
}