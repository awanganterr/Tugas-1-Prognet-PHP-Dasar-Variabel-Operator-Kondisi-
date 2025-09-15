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
            echo "Harga Nasi Goreng: Rp 15.000";
            break;
        case "soto":
            echo "Harga Soto: Rp 12.000";
            break;
        case "mieayam":
            echo "Harga Mie Ayam: Rp 10.000";
            break;
        default:
            echo "Menu tidak tersedia";
    }
}
?>
