<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="flash-kembali" data-flashdata="<?= $this->session->flashdata('kembali') ?>"></div>

    <div class="card shadow mb-2">

    <!-- <button type="button" onclick="playNotificationSound()">tes</button> -->
    
    <div class="card-body">
     <form action="" method="post" id="updateForm">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                   <input type="text" name="id_kar" id="id_kar" class="form-control bg-light border-0 small" placeholder="id_kar"
                       aria-label="Search" aria-describedby="basic-addon2">
               </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                   <input type="datetime-local" name="datetime" id="datetime" class="form-control bg-light border-0 small">
               </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                   <input type="text" name="keterangan" id="keterangan" class="form-control bg-light border-0 small">
               </div>
            </div>
            <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
            
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