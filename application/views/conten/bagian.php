<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Form</h6>
            </div>
            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama bagian</label>
                    <input type="text" class="form-control" id="devisiName" name="devisiName" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Devisi</label>
                    <select name="devisi" id="devisi" class="form-control">
                        <option value="" disabled selected>-- Choose One --</option>
                        <?php foreach ($devisi->result() as $row) { ?>
                            <option value="<?= $row->id ?>"><?= $row->devisi_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save Change</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $subtitle ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bagian</th>
                                <th>Nama Devisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x=1;
                            foreach ($bagian->result() as $row) {?>
                                <tr>
                                 <td><?= $x++; ?></td>
                                 <td><?= $row->nama_bagian ?></td>
                                 <td><?= $row->devisi_id ?></td>
                                 <td>
                                    <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
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
</div>

</div>
<!-- /.container-fluid -->