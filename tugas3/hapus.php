<?php include "koneksi.php"; ?>
<?php
// Gunakan prepared statement untuk DELETE
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo '<div style="font-family:Poppins,sans-serif;background:#f6f8fa;padding:40px;text-align:center;">
            <div style="display:inline-block;background:#fff;padding:30px 40px;border-radius:12px;box-shadow:0 0 10px rgba(0,0,0,0.1);">
                <h2 style="color:#2c3e50;">Data berhasil dihapus</h2>
                <a href="index.php" style="display:inline-block;background:#3498db;color:#fff;padding:8px 16px;border-radius:5px;text-decoration:none;margin-top:16px;">Kembali</a>
            </div>
          </div>';
} else {
    echo '<div style="font-family:Poppins,sans-serif;background:#f6f8fa;padding:40px;text-align:center;">
            <div style="display:inline-block;background:#fff;padding:30px 40px;border-radius:12px;box-shadow:0 0 10px rgba(0,0,0,0.1);">
                <h2 style="color:#e74c3c;">Error: ' . $stmt->error . '</h2>
                <a href="index.php" style="display:inline-block;background:#3498db;color:#fff;padding:8px 16px;border-radius:5px;text-decoration:none;margin-top:16px;">Kembali</a>
            </div>
          </div>';
}
$stmt->close();
?>
