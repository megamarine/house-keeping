<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="flash-add" data-flashdata="<?= $this->session->flashdata('add') ?>"></div>
    <div class="flash-cek" data-flashdata="<?= $this->session->flashdata('cek') ?>"></div>



    <?php
    if (validation_errors() == TRUE) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?= validation_errors(); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }
    ?>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $subtitle ?></h6>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">
                <i class="fa fa-plus"></i>
            </button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Karyawan</th>
                            <th style="width: 15%;">Nama Karyawan</th>
                            <th>Bagian</th>
                            <th>No RFID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x = 1;
                        $no = 1;
                        foreach ($employee->result() as $row) { ?>
                            <tr>
                                <td><?= $x++; ?></td>
                                <td style="font-size: 17px;">
                                    <?php
                                    if ($row->status == 1) { ?>
                                        <span class="badge badge-pill badge-primary"><?= $row->no_badge ?></span>
                                    <?php } else { ?>
                                        <span class="badge badge-pill badge-danger"><?= $row->no_badge ?></span>
                                    <?php }
                                    ?>
                                </td>
                                <td><?= $row->name ?></td>
                                <td><?= $row->nama_bagian ?></td>
                                <td><?= $row->rfid_no ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $no++; ?>"><i class="fa fa-edit"></i></button>
                                    <?php
                                    if ($row->status == 1) { ?>
                                        <a href="<?= site_url('index.php/Employee/delete/' . $row->id) ?>" class="btn btn-danger hapus-kar" title="Nonaktifkan Data"><i class="fa fa-power-off"></i></a>
                                    <?php }
                                    ?>
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

</div>
<!-- End of Main Content -->

</div>
<!-- /.container-fluid -->

<!-- Tambah Data -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('index.php/Employee/tambah_data') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $titleform ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ID Karyawan</label>
                        <input type="number" class="form-control" id="idkar" name="idkar" placeholder="123">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Karyawan</label>
                        <input type="text" class="form-control" id="namakar" name="namakar" placeholder="Jhon Cena" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bagian</label>
                        <select name="bagian" id="bagian" class="form-control select2" required>
                            <option value="" disabled selected>-- Pilih Bagian --</option>
                            <?php foreach ($bagian->result() as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->nama_bagian ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">No RFID</label>
                        <input type="text" class="form-control" id="rfidno" name="rfidno" placeholder="Tap With Card" required>
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
<!-- End Tambah Data -->

<!-- edit data -->
<?php
$y = 1;
foreach ($employee->result() as $e) {
    $bagian = $e->bagian_id;
?>
    <div class="modal fade" id="edit<?= $y++; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('index.php/Employee/update_data/' . $e->id) ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $titleform ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ID Karyawan</label>
                            <input type="number" class="form-control" id="idkar" name="idkar" value="<?= $e->no_badge ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Karyawan</label>
                            <input type="text" class="form-control" id="namakar" name="namakar" value="<?= $e->name ?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">No RFID</label>
                            <input type="text" class="form-control" id="rfidno" name="rfidno" value="<?= $e->rfid_no ?>">
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
?>
<!-- end edit data -->