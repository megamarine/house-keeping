<table class="table table-bordered" id="kembaliTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th>No</th>
        <th>No Badge</th>
        <th>Nama</th>
        <th>No RFID</th>
        <th>Item</th>
        <th>Deskripsi</th>
        <th>Pinjam</th>
        <th>Kembali</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php 
        $x=1;
        foreach ($kembali_list as $row) { ?>
        <tr>
            <td><?= $x++; ?></td>
            <td><?= $row->no_badge ?></td>
            <td><?= $row->name ?></td>
            <td><?= $row->rfid_no ?></td>
            <td><?= $row->item_name ?></td>
            <td><?= $row->deskripsi ?></td>
            <td><?= date('d-m-Y H:i:s', strtotime($row->tgl_pinjam)) ?></td>
            <td><?php 
                if ($row->tgl_kembali != null) {
                    echo date('d-m-Y H:i:s', strtotime($row->tgl_kembali));
                }else {
                    echo ' ';
                }
            ?></td>
            <td>
                <?php 
                if ($row->tgl_kembali != null) {?>
                    <span class="badge badge-success">Dikembalikan</span>
                <?php }else { ?>
                    <span class="badge badge-info">Dipinjam</span>
                <?php } ?>
            </td>
        </tr>
    <?php }
    ?>
    </tbody>
</table>