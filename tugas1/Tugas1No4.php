<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cek Nilai Huruf</title>
</head>
<body>
    <h1>Cek Nilai Huruf</h1>

    <form method="POST">
        Masukkan Nilai: <input type="number" name="nilai">
        <input type="submit" value="Cek">
    </form>

    <?php
    if (isset($_POST['nilai'])) {
        $n = $_POST['nilai'];

        if ($n >= 85) {
            echo "<p>Grade: A</p>";
        } elseif ($n >= 70) {
            echo "<p>Grade: B</p>";
        } elseif ($n >= 55) {
            echo "<p>Grade: C</p>";
        } elseif ($n >= 40) {
            echo "<p>Grade: D</p>";
        } else {
            echo "<p>Grade: E</p>";
        }
    }
    ?>
</body>
</html>
