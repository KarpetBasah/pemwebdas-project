<?php
    include("koneksi.php");
    $usr = $_POST["user"];
    $pss = md5($_POST["pass"]);
    $sql = mysqli_query($connect, "select * from user where username = '$usr' and password = '$pss'");
    $rowcount = mysqli_num_rows($sql);

    function Alert($msg){
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    if ($rowcount != 0) {
        session_start(); // fungsi mengaktifkan session

        $_SESSION["U"] = $usr;  // membuat varibel dalam session untuk data user
        $_SESSION["P"] = $pss;  // membuat variable dalam session untuk data password

        header("location:../pages/home.php");
    } else {
        Alert("Username atau Password Salah!");
        header("location:../pages/login.php");
    }
?>