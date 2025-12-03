<?php include "koneksi.php"; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];

    $stmt = mysqli_prepare($conn, "INSERT INTO mahasiswa (nama, prodi, angkatan) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssi", $nama, $prodi, $angkatan);
    mysqli_stmt_execute($stmt);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Tambah Mahasiswa</h2>

    <form method="POST">
        Nama:
        <input type="text" name="nama" required>

        Prodi:
        <input type="text" name="prodi" required>

        Angkatan:
        <input type="number" name="angkatan" required>

        <button type="submit">Simpan</button>
    </form>
</div>

</body>
</html>
