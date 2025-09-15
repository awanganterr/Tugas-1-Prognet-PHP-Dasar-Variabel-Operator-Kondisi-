<form method="POST">
    Masukkan Nilai: <input type="number" name="nilai">
    <input type="submit" value="Cek">
</form>

<?php
if (isset($_POST['nilai'])) {
    $n = $_POST['nilai'];

    if ($n >= 85) {
        echo "Grade: A";
    } elseif ($n >= 70) {
        echo "Grade: B";
    } elseif ($n >= 55) {
        echo "Grade: C";
    } elseif ($n >= 40) {
        echo "Grade: D";
    } else {
        echo "Grade: E";
    }
}
?>
