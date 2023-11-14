<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card shadow mb-2">

        <div class="card-body">
            <!-- <form action="<?= base_url('index.php/transaksi/pdf') ?>" method="post">
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
                        for ($i = $yn; $i >= $yn - 2; $i--) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php }
                        ?>
                    </select>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-danger" id="btn" type="button">
                            <i class="fas fa-file-pdf"></i>
                        </button>
                    </div>
                </div>
            </form> -->
            <form action="<?= base_url('index.php/report/export_with_filter') ?>" method="post">
                <!-- Export By Date -->
                <!-- <form action="<?= base_url('index.php/transaksi/pdf_bydate') ?>" method="post"> -->
                <div class="input-group col-md-4 mt-2">
                    <input type="date" class="form-control" name="date_start" id="date_start" required>
                    <input type="date" class="form-control" name="date_end" id="date_end" required>
                    <div class="input-group-append">
                        <!-- <button type="submit" class="btn btn-danger" id="btn" type="button">
                            <i class="fas fa-file-pdf"></i>
                        </button> -->
                    </div>
                </div>
                <!-- </form> -->

                <!-- Export by status -->
                <!-- <form action="<?= base_url('index.php/transaksi/pdf_status') ?>" method="post"> -->
                <div class="input-group col-md-4 mt-2">
                    <select name="status" id="status" class="form-control" required>
                        <option value="" disabled selected> -- Choose One --</option>
                        <option value="1">Belum Lunas</option>
                        <option value="2">Lunas</option>
                    </select>
                    <div class="input-group-append">
                        <!-- <button type="submit" class="btn btn-danger" id="btn" type="button">
                            <i class="fas fa-file-pdf"></i>
                        </button> -->
                    </div>
                </div>
                <!-- </form> -->

                <div class="input-group col-md-4 mt-2">
                    <button type="submit" class="btn btn-danger" id="btn" type="button">
                        <i class="fas fa-file-pdf"> | Export PDF</i>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->