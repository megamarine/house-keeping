<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

<div class="row">
    <div class="col-lg-5">
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Form</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('index.php/category/tambah_data') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name Category</label>
                    <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Company Category</label>
                    <select name="company_id" id="company_id" class="form-control" required>
                        <option value="" disabled selected>-- Choose One --</option>
                        <?php foreach ($company->result() as $row) { ?>
                            <option value="<?= $row->id ?>"><?= $row->aliases ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save Change</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
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
                                <th>Company Name</th>
                                <th>Company Aliases</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $x=1;
                           foreach ($categ->result() as $row) { ?>
                            <tr>
                                <td><?= $x++; ?></td>
                                <td><?= $row->nama_kategori ?></td>
                                <td><?= $row->aliases ?> </td>
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