<table class="table table-bordered" id="pinjamTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Karyawan</th>
            <th style="width: 15%;">Nama</th>
            <th>No. RFID</th>
            <th>Item</th>
            <th>Deskripsi</th>
            <th>Pinjam</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $x = 1;
        foreach ($pinjam_list as $row) { ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->no_badge ?></td>
                <td><?= $row->name ?></td>
                <td><?= $row->rfid_no ?></td>
                <td><?= $row->item_name ?></td>
                <td><?= $row->deskripsi ?></td>
                <td><?= date('d-m-Y H:i:s', strtotime($row->tgl_pinjam)) ?></td>
                <td>
                    <?php
                    if ($row->status == 1) { ?>
                        <span class="badge badge-info">Dipinjam</span>
                    <?php } else { ?>
                        <span class="badge badge-success">Dikembalikan</span>
                    <?php } ?>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>