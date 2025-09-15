<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pilih Menu Makanan</title>
</head>
<body>
    <h1>Pilih Menu Makanan</h1>

    <form method="POST">
        Pilih Makanan:
        <select name="makanan">
            <option value="nasigoreng">Nasi Goreng</option>
            <option value="soto">Soto</option>
            <option value="mieayam">Mie Ayam</option>
        </select>
        <input type="submit" value="Cek Harga">
    </form>

    <?php
    if (isset($_POST['makanan'])) {
        $makanan = $_POST['makanan'];
        switch ($makanan) {
            case "nasigoreng":
                echo "<p>Harga Nasi Goreng: Rp 15.000</p>";
                break;
            case "soto":
                echo "<p>Harga Soto: Rp 12.000</p>";
                break;
            case "mieayam":
                echo "<p>Harga Mie Ayam: Rp 10.000</p>";
                break;
            default:
                echo "<p>Menu tidak tersedia</p>";
        }
    }
    ?>
</body>
</html>
