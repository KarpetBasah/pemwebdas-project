<?php
include("../configs/koneksi.php");

$id = $_GET['id'];
$sql = mysqli_query($connect, "delete from user where id_user = '$id'");

header("location:../pages/user-man.php");
?>