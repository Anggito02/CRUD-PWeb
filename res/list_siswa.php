<?php

include("../config.php");

$query = "SELECT * FROM mahasiswa";
$data_siswa = mysqli_query($database, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SIPMB | Daftar Mahasiswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/list_siswa.css">
</head>
<body>
    <h1>DAFTAR MAHASISWA BARU</h1>

    <div class="container mt-5">
        <?php if (isset($_GET)): ?>
            <?php if (isset($_GET['status_delete'])): ?>
                <?php if ($_GET['status_delete'] == "success" ): ?>
                    <div class="status-wrapper d-flex align-items-center justify-content-center">
                        <p class="register-status bg-success rounded-2 text-light d-flex align-items-center justify-content-center">Data berhasil dihapus !</p>
                    </div>
                <?php elseif($_GET['status_delete'] == "failed"): ?>
                    <div class="status-wrapper d-flex align-items-center justify-content-center">
                        <p class="register-status bg-danger rounded-2 text-light d-flex align-items-center justify-content-center">Data gagal dihapus !</p>
                    </div>
                <?php endif ?>
            <?php elseif(isset($GET['status_edit'])): ?>
                <?php if($_GET['status_edit'] == "success"): ?>
                    <div class="status-wrapper d-flex align-items-center justify-content-center">
                        <p class="register-status bg-success rounded-2 text-light d-flex align-items-center justify-content-center">Data berhasil diubah !</p>
                    </div>
                <?php elseif($_GET['status_edit'] == "failed"): ?>
                    <div class="status-wrapper d-flex align-items-center justify-content-center">
                        <p class="register-status bg-danger rounded-2 text-light d-flex align-items-center justify-content-center">Data gagal diubah !</p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        <table class="table table-striped table-responsive">
            <caption><?= mysqli_num_rows($data_siswa) ?> data ditemukan</caption>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto Profil</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Agama</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach( $data_siswa as $data ):
                ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><img src="<?= $data["foto"] ?>" alt="Foto Profil <?= $data["nama"] ?>" width="60px" height= "80px"></td>
                        <td><?= $data["nama"] ?></td>
                        <td><?= $data["nrp"] ?></td>
                        <td><?= $data["jurusan"] ?></td>
                        <td><?= $data["email"] ?></td>
                        <td><?= $data["jenis_kelamin"] ?></td>
                        <td><?= $data["alamat"] ?></td>
                        <td><?= $data["agama"] ?></td>
                        <td><a href="./form_edit.php?nrp=<?= $data["nrp"] ?>"><button type="submit" class="btn btn-primary rounded-1">Edit</button></a></td>
                        <td><a href="./hapus.php?nrp=<?= $data["nrp"] ?>"><button type="submit" class="btn btn-danger rounded-1">Hapus</button></td>
                    </tr>
                <?php
                    $i++;
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex align-items-center justify-content-center gap-3">
        <a href="../index.php"><button type="button" class="btn btn-light border border-primary text-primary">Kembali ke Beranda</button></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>