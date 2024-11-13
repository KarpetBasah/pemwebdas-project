<?php
    if (!isset($_SESSION["U"]) || (!isset($_SESSION["P"]))) {
        header("location:login.php");
    }
    include("../configs/koneksi.php");
    
    $idbio = $_GET['id'];
    $sql = mysqli_query($connect, "select * from biography where id_bio = '$idbio'");

    $data = mysqli_fetch_array($sql);
?>

<!-- Biography form -->
<form name="bioform" method="post" action="">
    <div class="form-group">
        <label for="bioID">Biography Edit Form</label>
        <textarea class="form-control" name="bio" id="bioID" rows="3" placeholder="Type biography here">
            <?php if ($idbio != "") {
                echo $data["biography"];
            } ?>
        </textarea>
    </div>
    <div class="form-group">
        <label for="fotoID">Foto Profil</label>
        <input type="file" name="foto" id="fotoID">
    </div>
    <div class="form-group">
        <input type="submit" name="updatebio" class="btn btn-info" value="Update Data">
        <input type="reset" class="btn btn-secondary" value="Reset Data">
        <input type="button" class="btn btn-secondary" onclick="location.href='bio.php'" value="Back">
    </div>
</form>
<!-- End of biography form -->

<?php 
    if (isset($_POST['updatebio'])) {
        $bioaja = $_POST['bio'];

        $dir = "../uploads/";
        $filename = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$filename);

        $update = mysqli_query($connect,"update biography set biography = '$bioaja', photo = '$filename' where id_bio = '$idbio'");
        // Bila berhasil simpan kembali biografi
        if ($update) {
            (header("location:../pages/bio.php"));
        } else {
            echo "<script type='text/javascript'> onload=function() { alert('Data gagal disimpan!');} </script>";
        }
    }
?>