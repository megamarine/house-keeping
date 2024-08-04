<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="flash-kembali" data-flashdata="<?= $this->session->flashdata('kembali') ?>"></div>

    <div class="card shadow mb-2">

    <!-- <button type="button" onclick="playNotificationSound()">tes</button> -->
    
    <div class="card-body">
     <form action="" id="kembali" name="kembali" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id">
        <div class="input-group">
            <input type="text" name="rfid" id="rfid" class="form-control bg-light border-0 small" placeholder="Tab it..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary" id="save-data">
                    Simpan Data
                    <!-- <i class="fa-solid fa-share-from-square"></i> -->
                </button>
            </div>
        </div>
     </form>
    </div>
</div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Transaksi Kembali</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="div-table-kembali"></div>
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