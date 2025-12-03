<?php include "koneksi.php"; ?>

<?php
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan!");
}

$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM mahasiswa WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$m = mysqli_fetch_assoc($result);

if (!$m) {
    die("Data tidak ditemukan!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];

    $stmt = mysqli_prepare($conn, "UPDATE mahasiswa SET nama=?, prodi=?, angkatan=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "ssii", $nama, $prodi, $angkatan, $id);
    mysqli_stmt_execute($stmt);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit Mahasiswa</h2>

    <form method="POST">
        Nama:
        <input type="text" name="nama" value="<?= $m['nama'] ?>" required>

        Prodi:
        <input type="text" name="prodi" value="<?= $m['prodi'] ?>" required>

        Angkatan:
        <input type="number" name="angkatan" value="<?= $m['angkatan'] ?>" required>

        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>
