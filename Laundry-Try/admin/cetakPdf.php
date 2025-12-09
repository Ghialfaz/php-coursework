<?php
// Gunakan autoloader dari Composer
require_once __DIR__ . '/../vendor/autoload.php';

use Dompdf\Dompdf;

// koneksi database
include '../koneksi.php';

$html = '<!DOCTYPE html>';
$html .= '<html>';
$html .= '<head>';
$html .=' <title>Sistem Informasi Laundry Malas Ngoding - WWW.smarttechacademy.COM</title>';
$html .= '</head>';
$html .= '<body>';
$html .= '<center><h2>LAUNDRY " Malas Ngoding "</h2></center>';

$dari = $_GET['dari'];
$sampai = $_GET['sampai'];
$html .= '<h4>Data Laporan Laundry dari <b>'.$dari.'</b> sampai <b>'.$sampai.'</b></h4>';
$html .= '<table border="1" width="100%">';
$html .= '<tr>';
$html .= '<th width="1%">No</th>';
$html .= '<th>Invoice</th>';
$html .= '<th>Tanggal</th>';
$html .= '<th>Pelanggan</th>';
$html .= '<th>Berat (Kg)</th>';
$html .= '<th>Tgl. Selesai</th>';
$html .= '<th>Harga</th>';
$html .= '<th>Status</th>';
$html .= '</tr>';

$data = mysqli_query($koneksi,"SELECT * FROM pelanggan,transaksi WHERE transaksi_pelanggan=pelanggan_id AND date(transaksi_tgl) > '$dari' AND date(transaksi_tgl) < '$sampai' ORDER BY transaksi_id DESC");

$no = 1;
while($d=mysqli_fetch_array($data)){
  $html .= '<tr>';
  $html .= '<td>'.$no++.'</td>';
  $html .= '<td>INVOICE-'.$d['transaksi_id'].'</td>';
  $html .= '<td>'.$d['transaksi_tgl'].'</td>';
  $html .= '<td>'.$d['pelanggan_nama'].'</td>';
  $html .= '<td>'.$d['transaksi_berat'].'</td>';
  $html .= '<td>'.$d['transaksi_tgl_selesai'].'</td>';
  $html .= '<td> Rp. '.number_format($d["transaksi_harga"]).' ,-</td>';
  $html .= '<td>';
  if($d['transaksi_status']=="0"){
    $html .= "PROSES";
  }else if($d['transaksi_status']=="1"){
    $html .= "DICUCI";
  }else if($d['transaksi_status']=="2"){
    $html .= "SELESAI";
  }
  $html .= '</td>';
  $html .= '</tr>';
}

$html .= '</table>';
$html .= '</body>';
$html .= '</html>';

$dompdf = new Dompdf();
$dompdf->setPaper('A4', 'landscape');
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('laporan_dari'.$dari.'_sampai_'.$sampai.'.pdf');
?>