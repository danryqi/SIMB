<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "simb"; // Nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Tangkap data dari form
$nama = $_POST['nama'];
$usia = $_POST['usia'];
$jenisKelamin = $_POST['jenisKelamin'];
$deskripsiFisik = $_POST['deskripsiFisik'];
$lokasiTerakhir = $_POST['lokasiTerakhir'];
$tanggalHilang = $_POST['tanggalHilang'];
$kontakPelapor = $_POST['kontakPelapor'];

// Validasi sederhana
if (empty($nama) || empty($usia) || empty($jenisKelamin) || empty($deskripsiFisik) || empty($lokasiTerakhir) || empty($tanggalHilang) || empty($kontakPelapor)) {
    echo "Semua kolom wajib diisi!";
    exit;
}

// SQL untuk menyimpan data ke database
$sql = "INSERT INTO laporan_orang_hilang (nama, usia, jenis_kelamin, deskripsi_fisik, lokasi_terakhir, tanggal_hilang, kontak_pelapor)
        VALUES ('$nama', '$usia', '$jenisKelamin', '$deskripsiFisik', '$lokasiTerakhir', '$tanggalHilang', '$kontakPelapor')";

if ($conn->query($sql) === TRUE) {
    echo "Laporan berhasil disimpan!";
    header("location: lapor.php");
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
