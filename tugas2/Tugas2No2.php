<!doctype html>
<html>
<head><meta charset="utf-8"><title>Daftar Mahasiswa</title></head>
<body>
<h2>Daftar Mahasiswa (NIM => Nama)</h2>

<?php
// associative array: key = NIM, value = Nama
$mahasiswa = [
    "1805551001" => "Andi Santoso",
    "1805551002" => "Siti Aisyah",
    "1805551003" => "Budi Pratama",
    "1805551004" => "Dewi Lestari",
    "1805551005" => "Rizky Putra"
]; 

// tampilkan sebagai list HTML
echo "<ul>";
foreach ($mahasiswa as $nim => $nama) {
    // $nim berisi key (NIM), $nama berisi value
    echo "<li><strong>$nim</strong> &mdash; $nama</li>";
}
echo "</ul>";
?>
</body>
</html>
