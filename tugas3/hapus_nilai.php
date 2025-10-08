<?php
// hapus_nilai.php
include 'koneksi.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$mahasiswa_id = isset($_GET['mahasiswa_id']) ? intval($_GET['mahasiswa_id']) : 0;
if ($id <= 0 || $mahasiswa_id <= 0) {
    echo "ID tidak valid.";
    exit;
}
$stmt = $conn->prepare("DELETE FROM nilai WHERE id = ? AND mahasiswa_id = ?");
$stmt->bind_param("ii", $id, $mahasiswa_id);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location: nilai.php?mahasiswa_id=$mahasiswa_id");
exit;
