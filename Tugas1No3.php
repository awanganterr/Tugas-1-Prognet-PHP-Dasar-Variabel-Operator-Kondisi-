<form method="POST">
    Masukkan Angka: <input type="number" name="angka">
    <input type="submit" value="Cek">
</form>

<?php
if (isset($_POST['angka'])) {
    $angka = $_POST['angka'];
    if ($angka % 2 == 0) {
        echo "$angka adalah bilangan GENAP";
    } else {
        echo "$angka adalah bilangan GANJIL";
    }
}
?>
