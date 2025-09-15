<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cek Bilangan Ganjil / Genap</title>
</head>
<body>
    <h1>Cek Bilangan Ganjil / Genap</h1>

    <form method="POST">
        Masukkan Angka: <input type="number" name="angka">
        <input type="submit" value="Cek">
    </form>

    <?php
    if (isset($_POST['angka'])) {
        $angka = $_POST['angka'];
        if ($angka % 2 == 0) {
            echo "<p>$angka adalah bilangan GENAP</p>";
        } else {
            echo "<p>$angka adalah bilangan GANJIL</p>";
        }
    }
    ?>
</body>
</html>
