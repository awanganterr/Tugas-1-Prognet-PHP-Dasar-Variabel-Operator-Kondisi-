<?php
// nilai.php
include 'koneksi.php';

$mahasiswa_id = isset($_GET['mahasiswa_id']) ? intval($_GET['mahasiswa_id']) : 0;
if ($mahasiswa_id <= 0) {
    echo "ID mahasiswa tidak valid.";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $mahasiswa_id);
$stmt->execute();
$result = $stmt->get_result();
$mahasiswa = $result->fetch_assoc();
if (!$mahasiswa) {
    echo "Mahasiswa tidak ditemukan.";
    exit;
}
$stmt->close();

// Ambil data nilai
$stmt = $conn->prepare("SELECT * FROM nilai WHERE mahasiswa_id = ?");
$stmt->bind_param("i", $mahasiswa_id);
$stmt->execute();
$nilai_result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Nilai - <?php echo htmlspecialchars($mahasiswa['nama']); ?></title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f6f8fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        a.button {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.2s;
            margin-right: 8px;
        }
        a.button:hover {
            background-color: #2980b9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #3498db;
            color: white;
            padding: 10px;
            text-align: center;
        }
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #dff9fb;
        }
        .aksi a {
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
        }
        .aksi a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Nilai: <?php echo htmlspecialchars($mahasiswa['nama']); ?> (<?php echo htmlspecialchars($mahasiswa['nim']); ?>)</h2>
        <a href="tambah_nilai.php?mahasiswa_id=<?php echo $mahasiswa_id; ?>" class="button">+ Tambah Nilai</a>
        <a href="index.php" class="button" style="background:#7f8c8d;">Kembali</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai Huruf</th>
                    <th>Nilai Angka</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; while ($row = $nilai_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['mata_kuliah']); ?></td>
                    <td><?php echo htmlspecialchars($row['sks']); ?></td>
                    <td><?php echo htmlspecialchars($row['nilai_huruf']); ?></td>
                    <td><?php echo htmlspecialchars($row['nilai_angka']); ?></td>
                    <td class="aksi">
                        <a href="edit_nilai.php?id=<?php echo $row['id']; ?>&mahasiswa_id=<?php echo $mahasiswa_id; ?>">Edit</a> |
                        <a href="hapus_nilai.php?id=<?php echo $row['id']; ?>&mahasiswa_id=<?php echo $mahasiswa_id; ?>" onclick="return confirm('Yakin hapus nilai ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
$stmt->close();
$conn->close();
