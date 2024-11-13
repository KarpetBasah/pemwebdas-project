<!-- Content Biography -->
<?php 
    if (!isset($_SESSION["U"]) || (!isset($_SESSION["P"]))) {
        $btn_status = "hidden";
        $hr = "";
    } else {
        $btn_status = "";
        $hr = "<hr>";
        $iduser = $_SESSION["U"];
    }
    include("../configs/koneksi.php");

    // $user = $_SESSION["U"];

    // $sql = mysqli_query($connect, "select * from user where username = '$user'");
    $sql = mysqli_query($connect, "select * from biography join user on biography.id_user = user.id_user");
    // $data = mysqli_fetch_array($sql); // Menjadikan field menjadi ruang array


    // $bio = mysqli_query($connect, "SELECT * from biography JOIN user ON user.id_user = biography.id_user WHERE user.id_user = '$iduser'");
    // $biodata = mysqli_fetch_array($bio);
    // $bio = mysqli_query($connect, "SELECT * from biography JOIN user ON user.id_user = biography.id_user");
    // $data = mysqli_fetch_array($bio);
?>
<?php 
    include("../configs/koneksi.php");
    $sql_1 = mysqli_query($connect, "SELECT * from biography JOIN user ON user.id_user = biography.id_user");
    $bio = mysqli_fetch_array($sql_1);
?>

<button class="btn btn-info" <?php echo $btn_status; ?> onclick="location.href='bio-form.php?id'">Edit Data</button>
<?php 
    echo $hr; 
?>




<!-- <p style="text-align: center; margin-top: 30px;">
    
</p> -->

<table class="table table-stripped">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Biografi</th>
            <th scope="col">Foto</th>
        </tr>
    </thead>

    <?php
        $nomor = 1;
        while ($data = mysqli_fetch_array($sql)) { ?>
            <?php if ($data['name'] != "Admin") { ?>
            <tbody>
                <tr>
                    <td scope="row"><?php echo $nomor; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['biography']; ?></td>
                    <td><img src="../uploads/<?php echo $data['photo'] ?>" width="100px" alt="Gambar <?php echo $data['name']; ?>"></td>
                </tr>
            </tbody>
            <?php } ?>
            <?php $nomor++; } ?>
</table>

<!-- End of Content Biography -->