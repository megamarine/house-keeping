<table class="table table-bordered" id="rekaptransTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Karyawan</th>
            <th style="width: 15%;">Nama</th>
            <th>No. RFID</th>
            <th>Item</th>
            <th>Deskripsi</th>
            <th>Pinjam</th>
            <th>Kembali</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $x = 1;
        foreach ($rekap_trans_list as $row) { ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->no_badge ?></td>
                <td style="widtd: 15%;"><?= $row->name ?></td>
                <td><?= $row->rfid_no ?></td>
                <td><?= $row->item_name ?></td>
                <td><?= $row->deskripsi ?></td>
                <td><?= date('d-m-Y H:i:s', strtotime($row->tgl_pinjam)) ?></td>
                <td><?php
                    if ($row->tgl_kembali != null) {
                        echo date('d-m-Y H:i:s', strtotime($row->tgl_kembali));
                    } else {
                        echo ' ';
                    }
                    ?></td>
                <td><?= $row->keterangan ?></td>
                <td><?php
                    if ($row->tgl_kembali != null) { ?>
                        <span class="badge badge-success">Dikembalikan</span>
                    <?php } else { ?>
                        <span class="badge badge-info">Dipinjam</span>
                    <?php } ?>
                </td>
                <td>Action</td>
            </tr>
        <?php  }
        ?>
    </tbody>
</table>