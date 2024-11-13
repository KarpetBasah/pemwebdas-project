<!-- Head menyimpan -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Web</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- My css -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Personal Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php if ($pageinfo == "Home") {
                            echo "active";
                        } ?>">
                        <a class="nav-link" href="../pages/home.php">Home</a>
                    </li>
                    <li class="nav-item <?php if ($pageinfo == "Biography") {
                            echo "active";
                        } ?>">
                        <a class="nav-link" href="../pages/bio.php">Biografi</a>
                    </li>
                    <li class="nav-item <?php if ($pageinfo == "Portfolio") {
                            echo "active";
                        } ?>">
                        <a class="nav-link" href="../pages/porto.php">Portofolio</a>
                    </li>
                    <li class="nav-item <?php if ($pageinfo == "Contact") {
                            echo "active";
                        } ?>">
                        <a class="nav-link" href="../pages/contact.php">Contact</a>
                    </li>
                    <?php
                        session_start();
                        if ((!isset($_SESSION["U"])) and (!isset($_SESSION["P"]))) {
                            echo '<li class="nav-item">
                            <a class="nav-link" href="../pages/login.php">Login</a>
                        </li>';
                        } else {
                            include ("../configs/koneksi.php");
                            $sql = mysqli_query($connect, "select name from user where username='" . $_SESSION["U"] . "'");
                            $data = mysqli_fetch_array($sql);
                            if ($data[0] == "Admin") {
                                echo '<li class="nav-item '; if ($pageinfo == "User Management") { echo 'active'; } echo '">
                            <a class="nav-link" href="../pages/user-man.php">User Management</a>
                            </li>';
                            }
                            echo '<li class="nav-item">
                            <a class="nav-link" href="../pages/logout.php">| &nbsp; Halo, ' . $data[0] . '(Logout)</a>
                            </li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->