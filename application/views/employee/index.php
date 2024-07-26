<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- <div class="flash-add" data-flashdata="<?= $this->session->flashdata('add') ?>"></div>
    <div class="flash-cek" data-flashdata="<?= $this->session->flashdata('cek') ?>"></div> -->



    <!-- <?php
    if (validation_errors() == TRUE) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?= validation_errors(); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }
    ?> -->
    <div class="row">

        <div class="col-lg-4">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Form</h6>
                </div>
                <div class="card-body">
                    <form action="" id="emForm" name="emForm" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
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
                            <select name="bagian" id="bagian" class="form-control bagian" required style="width: 100%; height: 100%">
                                <option value="">-- Pilih Bagian --</option>
                                <?php foreach ($bagian->result() as $row) { ?>
                                    <option value="<?= $row->id ?>"><?= $row->nama_bagian ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">No RFID</label>
                            <input type="text" class="form-control" id="rfidno" name="rfidno" placeholder="Tap With Card" required>
                        </div>
                        <button type="submit" id="save-data" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $subtitle ?></h6>
                </div>
                <div class="card-body">
                    <!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah">
                        <i class="fa fa-plus"></i>
                    </button> -->
                    <div class="table-responsive">
                        <div id="div-table-em"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- /.container-fluid -->