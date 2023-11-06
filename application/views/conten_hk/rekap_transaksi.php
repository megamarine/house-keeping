<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<div class="flash-kembali" data-flashdata="<?= $this->session->flashdata('kembali') ?>"></div>

<div class="card shadow mb-2">
    
    <div class="card-body">
     <form action="<?= base_url('index.php/hk/transaksi/pdf') ?>" method="post">
         <div class="input-group col-md-4">
            <select name="bulan" id="bulan" class="form-control" required>
              <option value="" disabled selected>Pilih Bulan</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
            <select name="tahun" id="tahun" class="form-control">
              <?php 
              $yn = date('Y');
              for ($i=$yn; $i >= $yn-2 ; $i--) { ?>
                <option value="<?= $i ?>"><?= $i ?></option>
              <?php }
              ?>
            </select>
            <div class="input-group-append">
                <button type="submit" class="btn btn-danger" id="btn" type="button">
                    <i class="fas fa-file-pdf"></i>
                    <!-- <i class="fa-solid fa-share-from-square"></i> -->
                </button>
            </div>
        </div>
     </form>

     <!-- Export By Date -->
     <form action="<?= base_url('index.php/hk/transaksi/pdf_bydate') ?>" method="post">
         <div class="input-group col-md-4 mt-2">
            <input type="date" class="form-control" name="date_start" id="date_start" required>
            <input type="date" class="form-control" name="date_end" id="date_end" required>
            <div class="input-group-append">
                <button type="submit" class="btn btn-danger" id="btn" type="button">
                    <i class="fas fa-file-pdf"></i>
                    <!-- <i class="fa-solid fa-share-from-square"></i> -->
                </button>
            </div>
        </div>
     </form>

     <!-- Export by status -->
     <form action="<?= base_url('index.php/hk/transaksi/pdf_status') ?>" method="post">
         <div class="input-group col-md-4 mt-2">
            <select name="status" id="status" class="form-control">
                <option value="" disabled selected> -- Choose One --</option>
                <option value="1">Belum Lunas</option>
                <option value="2">Lunas</option>
            </select>
            <div class="input-group-append">
                <button type="submit" class="btn btn-danger" id="btn" type="button">
                    <i class="fas fa-file-pdf"></i>
                </button>
            </div>
        </div>
     </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rekap Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Badge</th>
                        <th>Nama</th>
                        <th>No RFID</th>
                        <th>Item</th>
                        <th>Deskripsi</th>
                        <th>Pinjam</th>
                        <th>Kembali</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    $no=1;
                    foreach ($rekap->result() as $row) { ?>
                    <tr>
                        <td><?= $x++; ?></td>
                        <td><?= $row->no_badge ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->rfid_no ?></td>
                        <td><?= $row->item_name ?></td>
                        <td><?= $row->deskripsi ?></td>
                        <td><?= $row->tgl_pinjam ?></td>
                        <td><?= $row->tgl_kembali ?></td>
                        <td><?= $row->keterangan ?></td>
                        <td>
                            <?php 
                            if ($row->tgl_kembali != null) {?>
                                <span class="badge badge-success">Dikembalikan</span>
                            <?php }else { ?>
                                <span class="badge badge-info">Dipinjam</span>
                            <?php } ?>
                        </td>
                        <td>  
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#edit<?= $no++; ?>">
                                    <i class="fa fa-check-circle"></i>
                            </button>                         
                        </td>
                    </tr>
                    <?php }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- <script>
    function setFocus() { 
        var input = document.getElementById('rfid');
        input.focus();
     }
</script> -->

<?php 
$y=1;
$date = date('Y-m-d h:i:s');
foreach ($rekap->result() as $row) {
?>
<div class="modal fade" id="edit<?= $y++; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="<?= base_url('index.php/transaksi/hk/update_last_trans/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Tanggal Pengembalian</label>
        <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $date ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php $no++;}
?>