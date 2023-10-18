<?php
$nama = $_POST['nama'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$subject = $_POST['subject'];
$pesan = $_POST['pesan'];

// Database connection
$conn = new mysqli('localhost', 'id21417845_portfoliokay', 'Portfoliokay123_', 'id21417845_portfolio'); // Sesuaikan nama database, username, dan password sesuai dengan konfigurasi Anda

// Periksa koneksi database
if ($conn->connect_error) {
  die('Connection Failed: ' . $conn->connect_error);
} else {
  // Buat pernyataan SQL untuk memasukkan data ke dalam tabel kontak
  $sql = "INSERT INTO kontak (nama, email, nohp, subject, pesan) VALUES (?, ?, ?, ?, ?)";

  // Persiapkan pernyataan SQL
  $stmt = $conn->prepare($sql);

  if ($stmt) {
    // Bind parameter ke pernyataan SQL
    $stmt->bind_param("ssiss", $nama, $email, $nohp, $subject, $pesan);

    // Eksekusi pernyataan SQL
    if ($stmt->execute()) {
      echo "Terima kasih atas pesan Anda.";
    } else {
      echo "Terjadi kesalahan saat mengirim pesan.";
    }

    // Tutup pernyataan dan koneksi
    $stmt->close();
    $conn->close();
  } else {
    echo "Terjadi kesalahan dalam persiapan pernyataan SQL.";
  }
}
?>