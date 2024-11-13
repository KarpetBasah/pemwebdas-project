<?php
    // error_reporting(0);
    // session_start();
    // if (!isset($_SESSION["U"]) || (!isset( $_SESSION["P"]))) {
    //     header("location:../pages/login.php");
    // } else {
        $pageinfo = "Biography Form";
        $description = "Form input biografi";
    
        include("../layouts/head.php");
        include("../layouts/header.php");
        include("../layouts/content.php"); // Mengarah ke content.php
        include("../layouts/footer.php");   
    // }

?>