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
                <form action="<?= base_url('index.php/item/tambah_data')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Item Name</label>
                    <input type="text" class="form-control" id="itemName" name="itemName" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Description</label>
                    <textarea name="deskripsi" id="deskripsi" required class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Category</label>
                    <select name="categ_id" id="categ_id" class="form-control" required>
                        <option value="" disabled selected>-- Choose One --</option>
                        <?php 
                        foreach ($categ->result() as $row) { ?>
                            <option value="<?= $row->id ?>"><?= $row->nama_kategori. ' - ' .$row->aliases ?></option>
                        <?php }
                        ?>
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
                                <th>Item Name</th>
                                <th>Deskripsi</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $x=1;
                           foreach ($item->result() as $row) { ?>
                            <tr>
                                <td><?= $x++; ?></td>
                                <td><?= $row->item_name ?></td>
                                <td><?= $row->deskripsi ?></td>
                                <td><?= $row->nama_kategori . ' - ' . $row->aliases ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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