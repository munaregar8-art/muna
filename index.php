<?php
include 'koneksi.php';
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];

    if (empty($nama) || empty($nim)) {
        $status = "UNIT TEST FAILED: Input tidak boleh kosong!";
    } else {
        $sql = "INSERT INTO data_mahasiswa (nama, nim) VALUES ('$nama', '$nim')";
        if (mysqli_query($conn, $sql)) {
            $status = "SYSTEM TEST PASSED: Data berhasil disimpan ke database!";
        } else {
            $status = "INTEGRATION TEST FAILED: Database error!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Testing Sistem</title>
</head>
<body>

<h2>Form Testing System</h2>

<form method="post">
    Nama :
    <input type="text" name="nama"><br><br>

    NIM :
    <input type="text" name="nim"><br><br>

    <button type="submit">Submit</button>
</form>

<h3><?php echo $status; ?></h3>

</body>
</html>