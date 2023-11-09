<?php
class M_transaksi extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function transaksi()
  {
    return $this->db->query("SELECT
      tt.id,
      tt.rfid_no,
      tt.tgl_pinjam,
      tt.tgl_kembali,
      tmt.item_name,
      tmt.deskripsi,
      tmk.no_badge,
      tmk.name
    FROM
      tbl_transaksi tt
    JOIN tbl_master_item tmt on
      tmt.id = tt.item_id
    JOIN tbl_master_karyawan tmk on tmk.rfid_no = tt.rfid_no order by tt.tgl_pinjam DESC");
  }

  function pinjam()
  {
    return $this->db->query("SELECT
      tt.id,
      tt.rfid_no,
      tt.tgl_pinjam,
      tt.tgl_kembali,
      tmt.item_name,
      tmt.deskripsi,
      tmk.no_badge,
      tmk.name,
      tt.status
    FROM
      tbl_transaksi tt
    JOIN tbl_master_item tmt on
      tmt.id = tt.item_id
    JOIN tbl_master_karyawan tmk on
      tmk.rfid_no = tt.rfid_no
    where
      tgl_pinjam >= date(now()) order by tt.id desc");
  }

  function kembali()
  {
    return $this->db->query("SELECT
      tt.id,
      tt.rfid_no,
      tt.tgl_pinjam,
      tt.tgl_kembali,
      tmt.item_name,
      tmt.deskripsi,
      tmk.no_badge,
      tmk.name,
      tt.status
    FROM
      tbl_transaksi tt
    JOIN tbl_master_item tmt on
      tmt.id = tt.item_id
    JOIN tbl_master_karyawan tmk on
      tmk.rfid_no = tt.rfid_no
    where
      DATE(tgl_pinjam) > (NOW() - INTERVAL 2 DAY) and tt.status = 2
	    order by tt.id desc");
  }

  function cek_pinjam($rfid_no)
  {
    return $this->db->query("SELECT
      *
    from
      tbl_transaksi tt
    where
      tgl_pinjam >= date(now()) and tt.rfid_no = '$rfid_no'
    order by
      tgl_pinjam desc")->num_rows();
  }

  function cek_kembali($rfid_no)
  {
    return $this->db->query("SELECT
    tgl_kembali
  from
    tbl_transaksi tt
  where
    tgl_pinjam >= date(now()) and tt.rfid_no = '$rfid_no'
  order by
    tgl_kembali desc");
  }

  function cek_kembali_sebelum($rfid_no) {
    return $this->db->query("SELECT
        tgl_pinjam,
        tgl_kembali
      from
        tbl_transaksi tt
      where
        tgl_pinjam > (DATE_SUB(CURDATE(), INTERVAL 1 day)) and tt.rfid_no = '$rfid_no'
      order by
        tgl_pinjam desc");
  }

  function rekap_trans()
  {
    return $this->db->query("SELECT
      tt.id,
      tt.rfid_no,
      tt.tgl_pinjam,
      tt.tgl_kembali,
      tt.status,
      tt.keterangan,
      tmt.item_name,
      tmt.deskripsi,
      tmk.no_badge,
      tmk.name
    from
      tbl_transaksi tt
    join tbl_master_item tmt on
      tmt.id = tt.item_id
    join tbl_master_karyawan tmk on
      tmk.rfid_no = tt.rfid_no
    order by
      tgl_pinjam desc");
  }

  function data_kar($rfid)
  {
    return $this->db->query("SELECT rfid_no, name, status FROM tbl_master_karyawan WHERE rfid_no = '$rfid'");
  }

  function cek_trans($rfid)
  {
    return $this->db->query("SELECT rfid_no, status FROM tbl_transaksi tt where rfid_no = '$rfid' and status = '1' order by tgl_pinjam asc limit 1");
  }

  function report($bln, $thn)
  {
    return $this->db->query("SELECT
        tt.id,
        tt.rfid_no,
        tt.tgl_pinjam,
        tt.tgl_kembali,
        tt.status,
        tt.keterangan,
        tmt.item_name,
        tmt.deskripsi,
        tmk.no_badge,
        tmk.name,
        tmb.nama_bagian 
      from
        tbl_transaksi tt
      join tbl_master_item tmt on
        tmt.id = tt.item_id
      join tbl_master_karyawan tmk on
        tmk.rfid_no = tt.rfid_no
      join tbl_master_bagian tmb on tmk.bagian_id = tmb.id
      where month(tgl_pinjam) = '$bln' and year(tgl_pinjam) = '$thn'");
  }

  function report_date_between($date_start, $date_end) {
    return $this->db->query("SELECT
      tt.id,
      tt.rfid_no,
      tt.tgl_pinjam,
      tt.tgl_kembali,
      tt.status,
      tt.keterangan,
      tmt.item_name,
      tmt.deskripsi,
      tmk.no_badge,
      tmk.name,
      tmb.nama_bagian 
    from
      tbl_transaksi tt
    join tbl_master_item tmt on
      tmt.id = tt.item_id
    join tbl_master_karyawan tmk on
      tmk.rfid_no = tt.rfid_no
    join tbl_master_bagian tmb on tmk.bagian_id = tmb.id
    where tt.date_pinjam between '$date_start' and '$date_end'");
  }

  function report_by_status($sts) {
    return $this->db->query("SELECT
      tt.id,
      tt.rfid_no,
      tt.tgl_pinjam,
      tt.tgl_kembali,
      tt.status,
      tt.keterangan,
      tmt.item_name,
      tmt.deskripsi,
      tmk.no_badge,
      tmk.name,
      tmb.nama_bagian 
    from
      tbl_transaksi tt
    join tbl_master_item tmt on
      tmt.id = tt.item_id
    join tbl_master_karyawan tmk on
      tmk.rfid_no = tt.rfid_no
    join tbl_master_bagian tmb on tmk.bagian_id = tmb.id
    where tt.status = $sts");
  }

  function report_all_filter($tgl_start, $tgl_end, $sts) {
    return $this->db->query("SELECT
      tt.id,
      tt.rfid_no,
      tt.tgl_pinjam,
      tt.tgl_kembali,
      tt.status,
      tt.keterangan,
      tmt.item_name,
      tmt.deskripsi,
      tmk.no_badge,
      tmk.name,
      tmb.nama_bagian 
    from
      tbl_transaksi tt
    join tbl_master_item tmt on
      tmt.id = tt.item_id
    join tbl_master_karyawan tmk on
      tmk.rfid_no = tt.rfid_no
    join tbl_master_bagian tmb on tmk.bagian_id = tmb.id
    where tt.date_pinjam BETWEEN '$tgl_start' and '$tgl_end' and tt.status = '$sts' ");
  }
}
