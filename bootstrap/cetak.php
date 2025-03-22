<?php
//Menggabungkan dengan file koneksi yang telah kita buat
include 'koneksi_barang.php';
 
// Load library phpspreadsheet
require('vendor/vendor/autoload.php');
 
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet
 
$spreadsheet = new Spreadsheet();
 
$spreadsheet->getActiveSheet()->mergeCells('A1:H1');
$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A3', 'No')
->setCellValue('B3', 'Jenis Barang')
->setCellValue('C3', 'Nama Barang')
->setCellValue('D3', 'No Barang')
->setCellValue('E3', 'Tanggal Pembelian')
->setCellValue('F3', 'Harga Barang')
->setCellValue('G3', 'Jumlah Barang')
->setCellValue('H3', 'Total Bayar ');

include ('koneksi_barang.php');
$query = mysqli_query($connection,"SELECT * FROM bt_bodycare");
$i = 4;
$no = 1;
while($row = mysqli_fetch_array($query)){
  $spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A'.$i, $no)
	->setCellValue('B'.$i, $row['jenis_barang'])
	->setCellValue('C'.$i, $row['nama_barang'])
	->setCellValue('D'.$i, $row['nomor_barang'])
	->setCellValue('E'.$i, $row['tanggal'])
  ->setCellValue('F'.$i, $row['harga_barang'])
  ->setCellValue('G'.$i, $row['jumlah_barang'])
  ->setCellValue('H'.$i, $row['total_bayar']);
	$i++; 
  $no++;

}


$writer = new Xlsx($spreadsheet);
$filename = 'bodycare.xlsx';
$writer->save($filename);

echo "<script>window.location = '$filename'</script>";
?>

?>



