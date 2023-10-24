<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?= $subtitle ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Register</th>
                                            <th>Nama Karyawan</th>
                                            <th>No RFID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $x=1;
                                        foreach ($employee->result() as $row) { ?>
                                            <tr>
                                                <td><?= $x++; ?></td>
                                                <td><?= $row->no_badge ?></td>
                                                <td><?= $row->name ?></td>
                                                <td><?= $row->rfid_no ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger"><i class="fa fa-power-off"></i></button>
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