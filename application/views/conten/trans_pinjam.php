<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<div class="flash-transaksi" data-flashdata="<?= $this->session->flashdata('trans') ?>"></div>
<div class="flash-cek" data-flashdata="<?= $this->session->flashdata('cek') ?>"></div>
<div class="flash-cekdata" data-flashdata="<?= $this->session->flashdata('cekdata') ?>"></div>
<div class="flash-cekdatatrans" data-flashdata="<?= $this->session->flashdata('cektrans') ?>"></div>

<!-- Form -->
<div class="card shadow mb-2">
    
    <div class="card-body">
     <form action="<?= base_url('index.php/transaksi/pinjam') ?>" method="post">
         <div class="input-group">
            <input type="text" name="rfid" id="rfid" class="form-control bg-light border-0 small" placeholder="Tab it..."
                aria-label="Search" aria-describedby="basic-addon2" autofocus>
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary" id="btn" type="button">
                    <i class="fas fa-truck fa-sm"></i>
                    <!-- <i class="fa-solid fa-share-from-square"></i> -->
                </button>
            </div>
        </div>
     </form>
    </div>
</div>
<!-- End Form -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Pinjam</h6>
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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach ($pinjam->result() as $row) { ?>
                    <tr>
                        <td><?= $x++; ?></td>
                        <td><?= $row->no_badge ?></td>
                        <td><?= $row->name ?></td>
                        <td><?= $row->item_name ?></td>
                        <td><?= $row->deskripsi ?></td>
                        <td><?= $row->tgl_pinjam ?></td>
                        <td>
                            <?php 
                            if ($row->status == 1) {?>
                                <span class="badge badge-info">Dipinjam</span>
                            <?php }else { ?>
                                <span class="badge badge-success">Dikembalikan</span>
                           <?php } ?>
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