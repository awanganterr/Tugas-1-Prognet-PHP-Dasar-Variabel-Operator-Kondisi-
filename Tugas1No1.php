<!DOCTYPE html>
<html>
<head>
    <title>Form Nama</title>
</head>

<h1>Form Nama</h1>

<body>
    <form method="POST">

        <Label for = 'nama'>Masukkan nama</Label>
        
        <input type="text" id = 'nama' name="nama">
        <input  type="submit" value="Kirim">
    </form>

    <?php
    if (isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        echo "Halo, $nama selamat belajar PHP!";
    }
    ?>
</body>
</html>