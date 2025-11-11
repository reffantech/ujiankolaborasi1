<?php
// Pastikan koneksi sudah dibuat di file koneksi.php
include 'koneksi.php';

// Ambil id dari URL dan pastikan berupa angka
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Cek apakah id valid
if ($id > 0) {
    // Gunakan prepared statement untuk keamanan
    $stmt = $koneksi->prepare("DELETE FROM kategori WHERE id_kategori = ?");
    $stmt->bind_param('i', $id);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Hapus data berhasil');
                location.href='index.php?page=kategori';
              </script>";
    } else {
        echo "<script>
                alert('Hapus data gagal');
                location.href='index.php?page=kategori';
              </script>";
    }

    $stmt->close();
} else {
    echo "<script>
            alert('ID tidak valid');
            location.href='index.php?page=kategori';
          </script>";
}
?>
