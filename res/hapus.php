<?php

include("../config.php");

if( isset($_GET) ) {

    $nrp = $_GET["nrp"];
    // buat query
    $query = "
        DELETE FROM mahasiswa
        WHERE nrp=$nrp;
    ";
    $status = mysqli_query($database, $query);

    // cek status query
    if($status) {
        // berhasil? beri status sukses
        header("Location: ./list_siswa.php?status_delete=success");
    }
    else {
        // gagal? beri status gagal
        header("Location: ./list_siswa.php?status_delete=failed");
    }
}

else {
    header("Location: ../index.php");
}

?>