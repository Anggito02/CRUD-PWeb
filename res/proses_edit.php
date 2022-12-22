<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( "Location: index.php" );
    die();
}

include("../config.php");

// cek submit button
if( isset($_POST['submit']) ) {
    // ambil data dari formulir
    $nama = $_POST['nama'];
    $nrp = $_POST['nrp'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenisKelamin'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $tmp_nama_foto = $_FILES['foto']['name'];
    $tmp_file_dir = $_FILES['foto']['tmp_name'];

    // proses nama foto
    $nama_foto = date('dmYHis')."-".$tmp_nama_foto;

    // file dir foto
    $path_foto = "../uploaded_files/profile_pict/".$nama_foto;

    // cek apakah sudah ter-upload
    if(move_uploaded_file($tmp_file_dir, $path_foto)) {
        // buat query
        $query = "
            UPDATE mahasiswa
            SET 
                nama='$nama',
                jurusan='$jurusan',
                email='$email',
                jenis_kelamin='$jenis_kelamin',
                alamat='$alamat',
                agama='$agama',
                foto='$path_foto'
            WHERE nrp=$nrp;
        ";
        $query_status = mysqli_query($database, $query);

        // query sukses?
        if( $query_status ) {
            // ya, kirim status sukses
            echo "SUKSES";
            header("Location: ./list_siswa.php?status_edit=success");
        }
        else {
            // tidak, kirim status gagal
            echo mysqli_error($database);
            header("Location: ./list_siswa.php?status_edit=failed");
        }
    }
}

?>