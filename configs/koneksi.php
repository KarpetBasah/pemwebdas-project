<?php
    $servername = "localhost";
    $dbuser = "diki";
    $dbpassword = "diki";
    $dbname = "personalweb_diki";

    $connect = mysqli_connect($servername, $dbuser, $dbpassword);

    $connecterror = "Koneksi gagal atau database tidak ada";
    mysqli_select_db($connect, $dbname ) or die($connecterror);
?>