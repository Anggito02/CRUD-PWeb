<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    header( "Location: index.php" );
    die();
}

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "pendaftaran_mahasiswa";

$database = mysqli_connect($server, $user, $password, $nama_database);

if( !$database ) {
    die("Gagal terhubung dengan database: ". mysqli_connect_error());
}

?>