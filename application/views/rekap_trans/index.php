<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="flash-kembali" data-flashdata="<?= $this->session->flashdata('kembali') ?>"></div>

    <div class="card shadow mb-2">

    <!-- <button type="button" onclick="playNotificationSound()">tes</button> -->
    
    <div class="card-body">
     <form action="" id="updateForm" name="updateForm" method="POST" enctype="multipart/form-data">
        <input type="text" id="id" name="id">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                   <input type="text" name="rfid_no" id="rfid_no" class="form-control bg-light border-0 small" placeholder="rfid_no"
                       aria-describedby="basic-addon2">
               </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                   <input type="datetime-local" name="tgl_kembali" id="tgl_kembali" class="form-control bg-light border-0 small">
               </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                   <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan" class="form-control bg-light border-0 small">
               </div>
            </div>
            <button type="submit" id="save-data" class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> | Update Data</button>
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
                <div id="div-table-rekap-trans"></div>
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