<?php
// report.php
require ('fpdf.php');
include 'connection.php';

class PDF extends FPDF
{
    // Header of the PDF
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 7, utf8_decode('DAFTAR MAHASISWA PRODI S1 REKAYASA PERANGKAT LUNAK'), 0, 1, 'C');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 7, utf8_decode('ITS SURABAYA - Tahun Ajaran 2025/2026'), 0, 1, 'C');
        
        $this->Ln(10);
        $this->SetLineWidth(0.4);
        $this->Line(10, thirtyTwo(), 287, thirtyTwo());
        $this->Ln(3);
    }

    // Footer of the PDF
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Dicetak pada ' . date('d-m-Y H:i') . ' | Halaman ' . $this->PageNo(), 0, 0, 'C');
    }
}

function thirtyTwo() { return 32; }

$pdf = new PDF('P', 'mm', 'A4');
$pdf->SetAutoPageBreak(true, 20);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

// Table header
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(30, 8, 'NIM', 1, 0, 'C', true);
$pdf->Cell(80, 8, 'Nama Mahasiswa', 1, 0, 'C', true);
$pdf->Cell(45, 8, 'Tanggal Lahir', 1, 0, 'C', true);
$pdf->Cell(40, 8, 'Nomor HP', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 10);

$q = "SELECT * FROM mahasiswa ORDER BY nama_lengkap ASC";
$res = mysqli_query($connect, $q);
if (!$res) {
    die('Query Error: ' . mysqli_error($connect));
}

while ($row = mysqli_fetch_assoc($res)) {
    $pdf->Cell(30, 8, $row['nim'], 1, 0);
    $pdf->Cell(80, 8, utf8_decode($row['nama_lengkap']), 1, 0);
    $pdf->Cell(45, 8, date('d-m-y', strtotime($row['tanggal_lahir'])), 1, 0);
    $pdf->Cell(40, 8, $row['no_hp'], 1, 1);
}

$pdf->Output('I', 'Daftar_Mahasiswa.pdf');
?>