<html>

<head>
    <title><?= $title; ?></title>
</head>

<body>
    <?php echo heading($title, 2); ?>
    <?php echo "Tanggal : " . $date . " - " . $month . " - " . $years; ?>
    <p><b>Tambah Kegiatan</b></p>
    
    <?php if (@$error) echo "Error : " . @$error; ?>
    <br>
    <form method="POST" enctype="multipart/form-data">
        <p>Nama Kegiatan <input type="text" name="kegiatan"></p>
        <p>Lampiran <input type="file" name="attach"></p>
        <input type="submit" name="aksi" value="Tambah">
    </form>
    <br>
    <br>
    <br>
    <p><b>Daftar Kegiatan</b></p>
    <br>
    <table>
        <tr>
            <th style="text-align: left">No</th>
            <th style="text-align: left">Kegiatan</th>
            <th style="text-align: left">Lampiran</th>
        </tr>
        <?php
            foreach ($infohari as $hari) {
                echo "<tr>";
                echo "  <td>$hari[id]</td>";
                echo "  <td>$hari[kegiatan]</td>";
                echo "  <td>$hari[attachment]</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>

</html>