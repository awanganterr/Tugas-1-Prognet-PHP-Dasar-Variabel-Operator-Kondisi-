<!doctype html>
<html>
<head><meta charset="utf-8"><title>Looping</title></head>
<body>
<h2>Contoh Looping PHP</h2>

<?php
// for: gunakan jika jumlah perulangan diketahui
for ($i = 1; $i <= 5; $i++) {
    // menampilkan teks "Perulangan ke-<nomor>" diikuti <br> untuk baris baru
    echo "Perulangan ke-$i <br>";
}

// while: gunakan jika bergantung kondisi
$i = 1;
while ($i <= 5) {
    echo "While: Perulangan ke-$i <br>";
    $i++; // penting: naikkan counter agar loop berhenti
}

// foreach: khusus untuk array
$buah = ["Apel", "Jeruk", "Mangga"];
foreach ($buah as $item) {
    echo "Buah: $item <br>";
}
?>
</body>
</html>
