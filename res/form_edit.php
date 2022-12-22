<?php

include("../config.php");

if( isset($_GET) ) {
    // simpan nrp yang mau di edit
    $nrp = $_GET['nrp'];

    // buat query
    $query = "
        SELECT * FROM mahasiswa
        WHERE nrp=$nrp;
    ";
    $query_status = mysqli_query($database, $query);

    // cek status query
    // berhasil?
    if($query_status) {
        $data_siswa = mysqli_fetch_assoc($query_status);

        //assign data ke variabel
        $nama = $data_siswa["nama"];
        $jurusan = $data_siswa["jurusan"];
        $email = $data_siswa["email"];
        $jenis_kelamin = $data_siswa["jenis_kelamin"];
        $alamat = $data_siswa["alamat"];
        $agama = $data_siswa["agama"];
        $path_foto = $data_siswa["foto"];
    }
    // gagal?
    else {
        // kembalikan ke list_siswa
        header("Location: ./list_siswa.php?status_edit=failed");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPMB | Perbarui Data Mahasiswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/form_edit.css">
</head>
<body>
    <h1>UPDATE DATA MAHASISWA BARU</h1>

    <div class="container">
        <form action="./proses_edit.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="namaHelp" value="<?= $nama ?>" required>
            </div>
            <div class="mb-3">
                <label for="nrp" class="form-label">NRP</label>
                <input type="text" class="form-control" name="nrp" id="nrp" aria-describedby="nrpHelp" placeholder="<?= $nrp ?>" disabled>
                <input type="text" class="form-control" name="nrp" id="nrp" aria-describedby="nrpHelp" value="<?= $nrp ?>" hidden>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" aria-describedby="jurusanHelp" value="<?= $jurusan ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="<?= $email ?>" required>
            </div>
            <div class="mb-3">
                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                <?php if($jenis_kelamin == "L"): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelaminL" value="L" checked>
                        <label class="form-check-label" for="jenisKelaminL">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelaminP" value="P">
                        <label class="form-check-label" for="jenisKelaminP">Perempuan</label>
                    </div>
                <?php else: ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelaminL" value="L">
                        <label class="form-check-label" for="jenisKelaminL">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelaminP" value="P" checked>
                        <label class="form-check-label" for="jenisKelaminP">Perempuan</label>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="alamatHelp" value="<?= $alamat ?>" required>
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" class="form-control" name="agama" id="agama" aria-describedby="agamaHelp" value="<?= $agama ?>" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="fotoHelp" required>
            </div>
            <div class="d-flex align-items-center justify-content-center gap-3">
                <button type="submit" name="submit" class="btn btn-primary rounded-1">Update</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>