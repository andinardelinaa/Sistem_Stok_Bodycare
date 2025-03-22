<?php
// Menggabungkan dengan file koneksi yang telah kita buat
include('koneksi_barang.php');

// Load library phpspreadsheet
require 'vendor/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// End load library phpspreadsheet

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A3', 'No');
$sheet->setCellValue('B3', 'Jenis Barang');
$sheet->setCellValue('C3', 'Nama Barang');
$sheet->setCellValue('D3', 'No Barang');
$sheet->setCellValue('E3', 'Tanggal Pembelian');
$sheet->setCellValue('F3', 'Harga Barang');
$sheet->setCellValue('G3', 'Jumlah Barang');
$sheet->setCellValue('H3', 'Total Bayar');

$query = "SELECT * FROM bt_bodycare ORDER BY id DESC";
$result = mysqli_query($connection, $query);
$i = 4;
$no = 1;

while ($row = mysqli_fetch_array($result)) {
    $sheet->setCellValue('A' . $i, $no);
    $sheet->setCellValue('B' . $i, isset($row['jenis_barang']) ? $row['jenis_barang'] : '');
    $sheet->setCellValue('C' . $i, isset($row['nama_barang']) ? $row['nama_barang'] : '');
    $sheet->setCellValue('D' . $i, isset($row['nomor_barang']) ? $row['nomor_barang'] : '');
    $sheet->setCellValue('E' . $i, isset($row['tanggal']) ? $row['tanggal'] : '');
    $sheet->setCellValue('F' . $i, isset($row['harga_barang']) ? $row['harga_barang'] : '');
    $sheet->setCellValue('G' . $i, isset($row['jumlah_barang']) ? $row['jumlah_barang'] : '');
    $sheet->setCellValue('H' . $i, isset($row['total_bayar']) ? $row['total_bayar'] : '');
    $i++;
    $no++;
}

$writer = new Xlsx($spreadsheet);
$filename = 'bodycare.xlsx';
$writer->save($filename);

echo "<script>window.location = '$filename'</script>";
?>
