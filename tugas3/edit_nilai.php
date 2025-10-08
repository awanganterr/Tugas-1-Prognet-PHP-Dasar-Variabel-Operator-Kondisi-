<?php
// edit_nilai.php
include 'koneksi.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$mahasiswa_id = isset($_GET['mahasiswa_id']) ? intval($_GET['mahasiswa_id']) : 0;
if ($id <= 0 || $mahasiswa_id <= 0) {
    echo "ID tidak valid.";
    exit;
}
// Ambil data mahasiswa
$stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $mahasiswa_id);
$stmt->execute();
$result = $stmt->get_result();
$mahasiswa = $result->fetch_assoc();
$stmt->close();
if (!$mahasiswa) {
    echo "Mahasiswa tidak ditemukan.";
    exit;
}
// Ambil data nilai
$stmt = $conn->prepare("SELECT * FROM nilai WHERE id = ? AND mahasiswa_id = ?");
$stmt->bind_param("ii", $id, $mahasiswa_id);
$stmt->execute();
$result = $stmt->get_result();
$nilai = $result->fetch_assoc();
$stmt->close();
if (!$nilai) {
    echo "Nilai tidak ditemukan.";
    exit;
}
$err = $sukses = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mata_kuliah = $_POST['mata_kuliah'];
    $sks = intval($_POST['sks']);
    $nilai_huruf = $_POST['nilai_huruf'];
    $nilai_angka = $_POST['nilai_angka'];
    if ($mata_kuliah && $sks && $nilai_huruf && $nilai_angka) {
        $stmt = $conn->prepare("UPDATE nilai SET mata_kuliah=?, sks=?, nilai_huruf=?, nilai_angka=? WHERE id=? AND mahasiswa_id=?");
        $stmt->bind_param("sisdis", $mata_kuliah, $sks, $nilai_huruf, $nilai_angka, $id, $mahasiswa_id);
        if ($stmt->execute()) {
            $sukses = "Nilai berhasil diupdate.";
            header("Location: nilai.php?mahasiswa_id=$mahasiswa_id");
            exit;
        } else {
            $err = "Gagal update nilai.";
        }
        $stmt->close();
    } else {
        $err = "Semua field harus diisi.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Nilai</title>
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
        form {
            width: 60%;
            margin: 30px auto 0 auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,0.05);
        }
        label {
            display: block;
            margin-bottom: 12px;
            color: #34495e;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-top: 4px;
        }
        button, a.button {
            background-color: #3498db;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 8px;
            text-decoration: none;
            font-size: 1em;
        }
        button:hover, a.button:hover {
            background-color: #2980b9;
        }
        .error {
            color: #e74c3c;
            text-align: center;
        }
    </style>
    <script>
    function validateForm() {
        var mk = document.forms["nilaiForm"]["mata_kuliah"].value;
        var sks = document.forms["nilaiForm"]["sks"].value;
        var huruf = document.forms["nilaiForm"]["nilai_huruf"].value;
        var angka = document.forms["nilaiForm"]["nilai_angka"].value;
        if (mk == "" || sks == "" || huruf == "" || angka == "") {
            alert("Semua field harus diisi!");
            return false;
        }
        if (isNaN(sks) || sks < 1 || sks > 8) {
            alert("SKS harus angka 1-8!");
            return false;
        }
        if (isNaN(angka) || angka < 0 || angka > 4) {
            alert("Nilai angka harus 0-4!");
            return false;
        }
        return true;
    }
    function setNilaiAngka() {
        var huruf = document.getElementById('nilai_huruf').value;
        var angka = 0;
        if (huruf == 'A') angka = 4.00;
        else if (huruf == 'B') angka = 3.00;
        else if (huruf == 'C') angka = 2.00;
        else if (huruf == 'D') angka = 1.00;
        else if (huruf == 'E') angka = 0.00;
        document.getElementById('nilai_angka').value = angka.toFixed(2);
    }
    </script>
</head>
<body>
    <div class="container">
        <h2>Edit Nilai untuk <?php echo htmlspecialchars($mahasiswa['nama']); ?> (<?php echo htmlspecialchars($mahasiswa['nim']); ?>)</h2>
        <?php if ($err) echo '<p class="error">'.$err.'</p>'; ?>
        <form name="nilaiForm" method="post" onsubmit="return validateForm();">
            <label>Mata Kuliah:
                <input type="text" name="mata_kuliah" value="<?php echo htmlspecialchars($nilai['mata_kuliah']); ?>">
            </label>
            <label>SKS:
                <input type="number" name="sks" min="1" max="8" value="<?php echo htmlspecialchars($nilai['sks']); ?>">
            </label>
            <label>Nilai Huruf:
                <select name="nilai_huruf" id="nilai_huruf" onchange="setNilaiAngka()">
                    <option value="">Pilih</option>
                    <option value="A" <?php if($nilai['nilai_huruf']=='A') echo 'selected'; ?>>A</option>
                    <option value="B" <?php if($nilai['nilai_huruf']=='B') echo 'selected'; ?>>B</option>
                    <option value="C" <?php if($nilai['nilai_huruf']=='C') echo 'selected'; ?>>C</option>
                    <option value="D" <?php if($nilai['nilai_huruf']=='D') echo 'selected'; ?>>D</option>
                    <option value="E" <?php if($nilai['nilai_huruf']=='E') echo 'selected'; ?>>E</option>
                </select>
            </label>
            <label>Nilai Angka:
                <input type="text" name="nilai_angka" id="nilai_angka" value="<?php echo htmlspecialchars($nilai['nilai_angka']); ?>" readonly>
            </label>
            <button type="submit">Update</button>
            <a href="nilai.php?mahasiswa_id=<?php echo $mahasiswa_id; ?>" class="button" style="background:#7f8c8d;">Batal</a>
        </form>
    </div>
    <script>setNilaiAngka();</script>
</body>
</html>
<?php $conn->close(); ?>
