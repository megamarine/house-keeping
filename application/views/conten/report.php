<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Hasil</title>

    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 12px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0080ff;
  color: white;
  font-weight: bold;
}
</style>
</head>
<body>
    <h2 style="align-content: center;"><?= $title ?></h2>
    <table id="customers">
        <tr>
            <th>No</th>
            <th>ID Karyawan</th>
            <th style="width: 10%;">Nama</th>
            <th>Bagian</th>
            <th>Tanggal Pinjam</th>
            <th>Waktu Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Waktu Kembali</th>
            <th>Keterangan</th>
        </tr>
        <?php
        $x=1; 
        foreach ($data->result() as $row) {?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->no_badge ?></td>
                <td><?= $row->name ?></td>
                <td><?= $row->nama_bagian ?></td>
                <td><?= date('d-m-Y', strtotime($row->tgl_pinjam)) ?></td>
                <td><?= date('H:i:s', strtotime($row->tgl_pinjam)) ?></td>
                <td><?php 
                    if ($row->tgl_kembali != null) {
                        echo date('d-m-Y', strtotime($row->tgl_kembali));
                    }else {
                        echo ' ';
                    }
                ?></td>
                <td><?php 
                    if ($row->tgl_kembali != null) {
                        echo date('H:i:s', strtotime($row->tgl_kembali));
                    }else {
                        echo ' ';
                    }
                ?></td>
                <td><?= $row->keterangan ?></td>
            </tr>
        <?php }
        ?>
    </table>
</body>
</html>