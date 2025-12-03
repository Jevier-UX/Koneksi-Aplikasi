<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Data Mahasiswa</h2>

    <form method="GET">
        <input type="text" name="cari" placeholder="Cari nama..." value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
        <button type="submit">Cari</button>
    </form>

    <br>
    <a href="tambah.php"><button>+ Tambah Mahasiswa</button></a>
    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>

        <?php
        if (isset($_GET['cari']) && $_GET['cari'] !== "") {
            $cari = "%" . $_GET['cari'] . "%";
            $stmt = mysqli_prepare($conn, "SELECT * FROM mahasiswa WHERE nama LIKE ?");
            mysqli_stmt_bind_param($stmt, "s", $cari);
        } else {
            $stmt = mysqli_prepare($conn, "SELECT * FROM mahasiswa");
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['prodi'] ?></td>
            <td><?= $row['angkatan'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
