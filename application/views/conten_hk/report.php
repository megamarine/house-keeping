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
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
    <h2 style="align-content: center;"><?= $title ?></h2>
    <table id="customers">
        <tr>
            <td>No</td>
            <td>ID Karyawan</td>
            <td>Nama</td>
            <td>Tanggal Pinjam</td>
            <td>Tanggal Kembali</td>
            <td>Keterangan</td>
        </tr>
        <?php
        $x=1; 
        foreach ($data->result() as $row) {?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->no_badge ?></td>
                <td><?= $row->name ?></td>
                <td><?= $row->tgl_pinjam ?></td>
                <td><?= $row->tgl_kembali ?></td>
                <td><?= $row->keterangan ?></td>
            </tr>
        <?php }
        ?>
    </table>
</body>
</html>