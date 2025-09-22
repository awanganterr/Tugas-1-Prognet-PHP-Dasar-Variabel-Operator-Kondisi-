<!doctype html>
<html>
<head><meta charset="utf-8"><title>Mahasiswa Nilai</title>
<style>table{border-collapse:collapse} th,td{border:1px solid #ccc;padding:6px}</style>
</head>
<body>
<h2>Data Mahasiswa + Nilai</h2>

<?php
$mahasiswa = [
    ["nim"=>"1805551001","nama"=>"Andi Santoso","umur"=>20,"prodi"=>"TI","nilai"=>85],
    ["nim"=>"1805551002","nama"=>"Siti Aisyah","umur"=>19,"prodi"=>"TI","nilai"=>72],
    ["nim"=>"1805551003","nama"=>"Budi Pratama","umur"=>21,"prodi"=>"SI","nilai"=>65],
    ["nim"=>"1805551004","nama"=>"Dewi Lestari","umur"=>20,"prodi"=>"TI","nilai"=>90],
    ["nim"=>"1805551005","nama"=>"Rizky Putra","umur"=>22,"prodi"=>"TI","nilai"=>58],
    ["nim"=>"1805551006","nama"=>"Rina Marlina","umur"=>18,"prodi"=>"SI","nilai"=>77],
    ["nim"=>"1805551007","nama"=>"Joko Widodo","umur"=>23,"prodi"=>"TI","nilai"=>69],
    ["nim"=>"1805551008","nama"=>"Maya Safitri","umur"=>20,"prodi"=>"SI","nilai"=>88],
    ["nim"=>"1805551009","nama"=>"Faisal Akbar","umur"=>19,"prodi"=>"TI","nilai"=>91],
    ["nim"=>"1805551010","nama"=>"Intan Pratiwi","umur"=>21,"prodi"=>"SI","nilai"=>74],
];

echo "<table>";
echo "<tr><th>No</th><th>NIM</th><th>Nama</th><th>Nilai</th><th>Keterangan</th></tr>";
$no = 1;
foreach ($mahasiswa as $m) {
    $ket = ($m['nilai'] >= 70) ? "Lulus" : "Tidak Lulus"; // kondisi lulus >= 70
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>" . $m['nim'] . "</td>";
    echo "<td>" . $m['nama'] . "</td>";
    echo "<td style='text-align:center'>" . $m['nilai'] . "</td>";
    echo "<td>$ket</td>";
    echo "</tr>";
    $no++;
}
echo "</table>";
?>
</body>
</html>
