<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Kembali</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Badge</th>
                        <th>Nama</th>
                        <th>Item</th>
                        <th>Deskripsi</th>
                        <th>Pinjam</th>
                        <th>Kembali</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach ($rekap->result() as $row) { ?>
                    <tr>
                        <td><?= $x++; ?></td>
                        <td><?= $row->no_badge ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->item_name ?></td>
                        <td><?= $row->deskripsi ?></td>
                        <td><?= $row->tgl_pinjam ?></td>
                        <td><?= $row->tgl_kembali ?></td>
                        <td>
                            <?php 
                            if ($row->tgl_kembali != null) {?>
                                <span class="badge badge-success">Dikembalikan</span>
                            <?php }else { ?>
                                <span class="badge badge-info">Dipinjam</span>
                            <?php } ?>
                        </td>
                        <td>Action</td>
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