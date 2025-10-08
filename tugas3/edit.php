<?php include "koneksi.php"; ?>
<?php
// Gunakan prepared statement untuk SELECT
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();
?>


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
input[type="text"] {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-top: 4px;
}
button, input[type="submit"], a.button {
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
button:hover, input[type="submit"]:hover, a.button:hover {
    background-color: #2980b9;
}
.error {
    color: #e74c3c;
    text-align: center;
}
</style>

<div class="container">
    <h2>Edit Mahasiswa</h2>
    <form method="post">
        <label>NIM:
            <input type="text" name="nim" value="<?= $data['nim'] ?>">
        </label>
        <label>Nama:
            <input type="text" name="nama" value="<?= $data['nama'] ?>">
        </label>
        <label>Prodi:
            <input type="text" name="prodi" value="<?= $data['prodi'] ?>">
        </label>
        <input type="submit" name="update" value="Update">
        <a href="index.php" class="button" style="background:#7f8c8d;">Batal</a>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    $stmt = $conn->prepare("UPDATE mahasiswa SET nim=?, nama=?, prodi=? WHERE id=?");
    $stmt->bind_param("sssi", $nim, $nama, $prodi, $id);
    if ($stmt->execute()) {
        echo "Data berhasil diperbarui <a href='index.php'>Kembali</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
