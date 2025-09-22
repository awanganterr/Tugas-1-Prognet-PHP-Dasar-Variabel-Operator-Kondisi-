<!doctype html>
<html>
<head><meta charset="utf-8"><title>Bilangan Genap</title></head>
<body>
<h2>Bilangan Genap (n1 &lt; n2)</h2>

<form method="get">
    n1: <input type="number" name="n1" required> &nbsp;
    n2: <input type="number" name="n2" required> &nbsp;
    <button type="submit">Tampilkan</button>
</form>

<?php
if (isset($_GET['n1']) && isset($_GET['n2'])) {
    $n1 = intval($_GET['n1']);
    $n2 = intval($_GET['n2']);

    if ($n1 >= $n2) {
        echo "<p style='color:red;'>Syarat: n1 harus < n2. Silakan coba lagi.</p>";
    } else {
        echo "<p>Bilangan genap antara <strong>$n1</strong> sampai <strong>$n2</strong>:</p>";
        echo "<ul>";
        // mulai loop dari n1 sampai n2
        for ($i = $n1; $i <= $n2; $i++) {
            if ($i % 2 == 0) { // modulus 2 == 0 => genap
                echo "<li>$i</li>";
            }
        }
        echo "</ul>";
    }
}
?>
</body>
</html>
