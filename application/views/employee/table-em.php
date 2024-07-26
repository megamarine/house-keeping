<table class="table table-bordered" id="empTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Karyawan</th>
            <th style="width: 15%;">Nama Karyawan</th>
            <th>Bagian</th>
            <th>No RFID</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $x=1;
        $no=1;
        foreach ($emp_list as $row) { ?>
        
        <tr>
            <td> <?= $x++; ?></td>
            <td><?= $row->no_badge ?></td>
            <td style="width: 20%;"><?= $row->name ?></td>
            <td style="width: 25%;"><?= $row->nama_bagian ?></td>
            <td><?= $row->rfid_no ?></td>
            <td>
                <button type="button" class="btn btn-warning edit" data-id="<?= $row->id ?>"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger delete" data-id="<?= $row->id ?>"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>