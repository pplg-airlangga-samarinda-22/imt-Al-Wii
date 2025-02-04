<?php
function hitungBMI($berat, $tinggi) {
return $berat / ($tinggi * $tinggi);
}

    function kategoriBMI($bmi) {
    if ($bmi < 17.0) {
        return "Kurus, Kekurangan berat badan berat";
    } elseif ($bmi >= 17.0 && $bmi <= 18.4) {
        return "Kurus, Kekurangan berat badan ringan";
    } elseif ($bmi >= 18.5 && $bmi <= 25.0) {
        return "Normal";
    } elseif ($bmi <= 25.1 && $bmi <= 27.0) {
        return "Gemuk, Kelebihan berat badan tingkat ringan";
    } else {
        return "Gemuk, Kelebihan berat badan tingkat berat";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];

    if (is_numeric($berat) && is_numeric($tinggi) && $berat > 0 && $tinggi > 0) {
        
        $bmi = hitungBMI($berat, $tinggi);
        $kategori = kategoriBMI($bmi);
        
        echo "<p>IMT Anda : " . number_format($bmi, 1) . "</p>";
        echo "<p>Kategori : $kategori</p>";
    } else {
        echo "<p>Nilai Yang di Masukkan Tidak Valid!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator IMT</title>
</head>

<body>
    <h1>Kalkulator Indeks Massa Tubuh (IMT)</h1>
    <form method="post" action="">
        <label for="berat">Berat badan (kg):</label>
        <input type="number" step="any" name="berat" id="berat" required><br><br>

        <label for="tinggi">Tinggi badan (m):</label>
        <input type="number" step="any" name="tinggi" id="tinggi" required><br><br>

        <button type="submit">Hitung IMT</button>
    </form>
</body>

</html>