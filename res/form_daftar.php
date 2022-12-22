<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPMB | Pendaftaran Mahasiswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/form_daftar.css">
</head>
<body>
    <h1>PENDAFTARAN MAHASISWA BARU</h1>

    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] == "success" ): ?>
            <div class="status-wrapper d-flex align-items-center justify-content-center my-3">
                <p class="register-status bg-success rounded-2 text-light d-flex align-items-center justify-content-center">Data berhasil ditambahkan !</p>
            </div>
        <?php else: ?>
            <div class="status-wrapper d-flex align-items-center justify-content-center my-3">
                <p class="register-status bg-danger rounded-2 text-light d-flex align-items-center justify-content-center">Data gagal ditambahkan !</p>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="container">
        <form action="./proses_pendaftaran.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="namaHelp" required>
            </div>
            <div class="mb-3">
                <label for="nrp" class="form-label">NRP</label>
                <input type="text" class="form-control" name="nrp" id="nrp" aria-describedby="nrpHelp" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" aria-describedby="jurusanHelp" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelaminL" value="L">
                    <label class="form-check-label" for="jenisKelaminL">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelaminP" value="P">
                    <label class="form-check-label" for="jenisKelaminP">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="alamatHelp" required>
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" class="form-control" name="agama" id="agama" aria-describedby="agamaHelp" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="fotoHelp" required>
            </div>
            <div class="d-flex align-items-center justify-content-center gap-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <a href="../index.php"><button type="button" class="btn btn-light border border-primary text-primary">Kembali ke Beranda</button></a>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>