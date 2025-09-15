<form method="POST">
    Nama: <input type="text" name="nama"><br>
    Umur: <input type="number" name="umur"><br>
    Jenis Kelamin: 
    <select name="jk">
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select><br>
    Alamat: <input type="text" name="alamat"><br>
    <input type="submit" value="Kirim">
</form>

<?php
if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    echo "Halo, nama saya $nama. Umur saya $umur tahun. ";
    echo "Saya seorang $jk. ";
    echo "Saya tinggal di $alamat.";
}
?>
