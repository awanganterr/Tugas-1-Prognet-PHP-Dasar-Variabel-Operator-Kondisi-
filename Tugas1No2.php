<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator</title>
</head>
<body>
    <form method="POST">
        Angka 1: <input type="number" name="angka1"><br>
        Angka 2: <input type="number" name="angka2"><br>
        Operator:
        <select name="operator">
            <option value="tambah">Tambah</option>
            <option value="kurang">Kurang</option>
            <option value="kali">Kali</option>
            <option value="bagi">Bagi</option>
        </select>
        <input type="submit" value="Hitung">
    </form>

    <?php
    if (isset($_POST['angka1']) && isset($_POST['angka2'])) {
        $a = $_POST['angka1'];
        $b = $_POST['angka2'];
        $op = $_POST['operator'];

        switch ($op) {
            case "tambah":
                $hasil = $a + $b;
                break;
            case "kurang":
                $hasil = $a - $b;
                break;
            case "kali":
                $hasil = $a * $b;
                break;
            case "bagi":
                $hasil = $a / $b;
                break;
            default:
                $hasil = "Operator tidak valid!";
        }
        echo "Hasil: $hasil";
    }
    ?>
</body>
</html>
