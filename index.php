<?php
/** 
 * tambahkan file yang berisi koneksi database
 */
require 'config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Belajar PHP- Membuat Laporan PDF dengan PHP</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
	<table>
		<tr>
			<td>Kode Mobil</td>
			<td>Merk</td>
			<td>Type</td>
			<td>Warna</td>
			<td>Harga</td>
			<td>Gambar</td>
		</tr>
    <?php
    $sql = 'SELECT * FROM mobil';
    /**
     * $db : berasal dari file config.php
     */
    $mobils = $db->query($sql);

    if ($mobils->num_rows > 0) : 
        while($mobil = $mobils->fetch_assoc()) : ?>
            <tr>
            	<td><?php echo $mobil['kode_mobil'];?></td>
            	<td><?php echo $mobil['merk'];?></td>
            	<td><?php echo $mobil['type_mobil'];?></td>
            	<td><?php echo $mobil['warna'];?></td>
            	<td><?php echo $mobil['harga'];?></td>
            	<td><img src="<?php echo $mobil['gambar'];?>" width="50%"></td>
            </tr>
        <?php endwhile;?>

    <?php endif; ?>
	</table>
    <a href="cetak-laporan.php" class="button-a">Cetak Laporan</a>
</body>
</html>