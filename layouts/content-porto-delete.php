<?php
include("../configs/koneksi.php");

$id = $_GET['id'];
$sql = mysqli_query($connect, "delete from portfolio where id_port = '$id'");

header("location:../pages/porto.php");
?>