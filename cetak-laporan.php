<?php
require 'config.php';
require 'fpdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);

$pdf->SetFillColor(39,40,34);
$pdf->SetTextColor(255,255,255);

$pdf->Cell(30,10,'Kode Mobil', 0, 0, 'C', true);
$pdf->Cell(30,10,'Merk', 0, 0, 'C', true);
$pdf->Cell(30,10,'Type', 0, 0, 'C', true);
$pdf->Cell(30,10,'Warna', 0, 0, 'C', true);
$pdf->Cell(30,10,'Harga Mobil', 0, 0, 'C', true);
$pdf->Cell(40,10,'Gambar', 0, 0, 'C', true);
$pdf->Ln(10);


$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);

/**
 * SQL : mengambil data dari database
 */

$sql = "SELECT * FROM mobil";

# $db dari file config.php
$query = $db->query($sql);

$n = 22;
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
    	$pdf->Cell(30,10, $row['kode_mobil'], 1, 0, 'C');
    	$pdf->Cell(30,10, $row['merk'], 1, 0, 'C');
		$pdf->Cell(30,10, $row['type_mobil'], 1, 0, 'C');
		$pdf->Cell(30,10, $row['warna'], 1, 0, 'C');
		$pdf->Cell(30,10, $row['harga'], 1, 0, 'C');
		/**
		 * ABSPATH . $row['gambar'] // c:/xampp/htdocs/laporan-fpdf/uploads/namagambar.jpg
		 */
		
		/**
		 * penampilan gambar dimanipulasi dengan $n sebagai poros Y dengan nilai default 22 
		 * dan akan bertambah 10 setiap kali loop
		 */
		$pdf->Image(ABSPATH . $row['gambar'], 170, $n, 18, 8);
		$pdf->Cell(40,10, '', 1, 0, 'C');
		$pdf->Ln();

		$n = $n+10;
    }
}

$pdf->Output('I');
?>