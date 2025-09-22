<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Daftar Harga</title>
<style>
table { border-collapse: collapse; width: 60%; margin: auto; }

th, td { padding: 8px 10px; border: 1px solid #ccc; }
th { text-align: left; }
td.price { text-align: left; } /* alignment agar harga rata kiri */
</style>
</head>
<body>
<h2>Daftar Harga Barang<style>{margin: auto;}</style></h2>
<?php
$harga = [
    "Buku Tulis" => 8000,
    "Pulpen" => 3000,
    "Penggaris" => 2500,
    "Penghapus" => 1500,
    "Spidol" => 10000
];

echo "<table>";
echo "<tr><th>No</th><th>Nama Barang</th><th>Harga (Rp)</th></tr>";
$no = 1;
foreach ($harga as $nama => $hrg) {
    // number_format membuat pemisah ribuan agar lebih mudah dibaca
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>$nama</td>";
    echo "<td class='price'>" . number_format($hrg,0,',','.') . "</td>";
    echo "</tr>";
    $no++;
}
echo "</table>";
?>
</body>
</html>
