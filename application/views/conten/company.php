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
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Company Name</label>
                    <input type="text" class="form-control" id="companyName" name="companyName" placeholder="PT. ABC" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Company Aliases</label>
                    <input type="text" class="form-control" id="companyAliases" name="companyAliases" placeholder="ABC">
                </div>
                <button type="submit" class="btn btn-primary">Save Change</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Company List</h6>
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
                            $no=1;
                            foreach ($company->result() as $row) { ?>
                                <tr>
                                    <td><?= $x++; ?></td>
                                    <td><?= $row->name ?></td>
                                    <td><?=  $row->aliases ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $no++; ?>"><i class="fa fa-edit"></i></button>
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


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php 
$y=1;
foreach ($company->result() as $row) { ?>
    <!-- Modal -->
<div class="modal fade" id="edit<?= $y++; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="<?= base_url('index.php/company/update_data/'.$row->id) ?>" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Form Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="exampleFormControlInput1">Company Name</label>
            <input type="text" class="form-control" id="companyName" name="companyName" value="<?= $row->name ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Company Aliases</label>
            <input type="text" class="form-control" id="companyAliases" name="companyAliases" value="<?= $row->aliases ?>">
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

<?php $no++;}
?>