<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Biodata</title>
</head>
<body>
    <h1>Form Biodata Singkat</h1>

    <form method="POST">
        Nama: <input type="text" name="nama"><br><br>
        Umur: <input type="number" name="umur"><br><br>
        Jenis Kelamin: 
        <select name="jk">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br><br>
        Alamat: <input type="text" name="alamat"><br><br>
        <input type="submit" value="Kirim">
    </form>

    <?php
    if (isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];

        echo "<p>Halo, nama saya $nama. Umur saya $umur tahun. ";
        echo "Saya seorang $jk. ";
        echo "Saya tinggal di $alamat.</p>";
    }
    ?>
</body>
</html>