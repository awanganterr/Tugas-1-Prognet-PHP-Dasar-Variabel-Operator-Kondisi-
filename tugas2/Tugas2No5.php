<!doctype html>
<html>
<head><meta charset="utf-8"><title>Mahasiswa Multidimensi</title>
<style>table{border-collapse:collapse} th,td{border:1px solid #ccc;padding:6px}</style>
</head>
<body>
<h2>Data Mahasiswa (Multidimensi)</h2>

<?php
$mahasiswa = [
    ["nim"=>"1805551001","nama"=>"Andi Santoso","umur"=>20,"prodi"=>"TI"],
    ["nim"=>"1805551002","nama"=>"Siti Aisyah","umur"=>19,"prodi"=>"TI"],
    ["nim"=>"1805551003","nama"=>"Budi Pratama","umur"=>21,"prodi"=>"Sistem Informasi"],
    ["nim"=>"1805551004","nama"=>"Dewi Lestari","umur"=>20,"prodi"=>"TI"],
    ["nim"=>"1805551005","nama"=>"Rizky Putra","umur"=>22,"prodi"=>"TI"],
    ["nim"=>"1805551006","nama"=>"Rina Marlina","umur"=>18,"prodi"=>"SI"],
    ["nim"=>"1805551007","nama"=>"Joko Widodo","umur"=>23,"prodi"=>"TI"],
    ["nim"=>"1805551008","nama"=>"Maya Safitri","umur"=>20,"prodi"=>"SI"],
    ["nim"=>"1805551009","nama"=>"Faisal Akbar","umur"=>19,"prodi"=>"TI"],
    ["nim"=>"1805551010","nama"=>"Intan Pratiwi","umur"=>21,"prodi"=>"SI"],
];

echo "<table>";
echo "<tr><th>No</th><th>NIM</th><th>Nama</th><th>Umur</th><th>Prodi</th></tr>";
$no = 1;
foreach ($mahasiswa as $m) {
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>" . $m['nim'] . "</td>";
    echo "<td>" . $m['nama'] . "</td>";
    echo "<td style='text-align:center'>" . $m['umur'] . "</td>";
    echo "<td>" . $m['prodi'] . "</td>";
    echo "</tr>";
    $no++;
}
echo "</table>";
?>
</body>
</html>
