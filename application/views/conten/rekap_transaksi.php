<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="flash-kembali" data-flashdata="<?= $this->session->flashdata('kembali') ?>"></div>

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
                        $x = 1;
                        $no = 1;
                        $a = 1;
                        foreach ($rekap->result() as $row) { ?>
                            <tr>
                                <td><?= $x++; ?></td>
                                <td><?= $row->no_badge ?></td>
                                <td><?= $row->name ?></td>
                                <td><?= $row->rfid_no ?></td>
                                <td><?= $row->item_name ?></td>
                                <td><?= $row->deskripsi ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($row->tgl_pinjam)) ?></td>
                                <td><?php
                                    if ($row->tgl_kembali != null) {
                                        echo date('d-m-Y H:i:s', strtotime($row->tgl_kembali));
                                    } else {
                                        echo ' ';
                                    }
                                    ?></td>
                                <td><?= $row->keterangan ?></td>
                                <td>
                                    <?php
                                    if ($row->tgl_kembali != null) { ?>
                                        <span class="badge badge-success">Dikembalikan</span>
                                    <?php } else { ?>
                                        <span class="badge badge-info">Dipinjam</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#edittrans<?= $no++; ?>">
                                        <i class="fa fa-check-circle"></i>
                                    </button> -->
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $a++; ?>">
                                        Launch demo modal
                                    </button> -->
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

<!-- <?php
$y = 1;
$date = date('Y-m-d H:i:s');
foreach ($rekap->result() as $row) {
?>
    <div class="modal fade" id="edittrans<?= $y++; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('index.php/transaksi/update_last_trans/' . $row->id) ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data <?= $row->name ?></h5>
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
                            <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
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
<?php $no++;
}
?> -->