<?php
include ("../configs/koneksi.php");

$id = $_GET['id'];

$sql = mysqli_query($connect, "select * from portfolio where id_port = '$id'");
$data = mysqli_fetch_array($sql);
if ($id == "") {
    $idport = "hidden";
    $actbtn = "addport";
    $actval = "Save Data";
} else {
    $idport = "readonly";
    $actbtn = "updateport";
    $actval = "Update Data";
}
?>
<!-- Portfolio Form -->
<form name="portform" method="post" action="" onsubmit="return Validasi()">
    <div class="form-group" <?php echo $idport; ?>>
        <label for="portID">Portfolio ID</label>
        <input type="text" class="form-control" name="port" id="portID" value="<?php if ($id != "") {
        echo $data['id_port'];   
        } ?>">
    </div>
    <div class="form-group">
        <label for="projID">Project Name</label>
        <input type="text" class="form-control" name="proj" id="projID" value="<?php if ($id != "") {
            echo $data['project_name'];
        } ?>"
            placeholder="Type project name here">
        <span id="proj-error" class="error-message"></span>
    </div>
    <div class="form-group">
        <label for="yearID">Year</label>
        <input type="text" class="form-control" name="year" id="yearID" value="<?php if ($id != "") {
            echo $data['year'];
        } ?>"
            placeholder="Type year here">
        <span id="year-error" class="error-message"></span>
    </div>
    <div class="form-group">
        <label for="descID">Description</label>
        <textarea class="form-control" name="desc" id="descID" rows="3" placeholder="type description here"> <?php if ($id != "") {
            echo $data['description'];
        } ?></textarea>
        <span id="desc-error" class="error-message"></span>
    </div>
    <div class="form-group">
        <input type="submit" name="<?php echo $actbtn; ?>" class="btn btn-info" value="<?php echo $actval; ?>">
        <input type="submit" class="btn btn-secondary" value="Reset Data">
        <input type="button" class="btn btn-secondary" onclick="location.href='../pages/porto.php';" value="Back">
    </div>

</form>
<!-- End of portfolio form -->
<!-- Jika submit button di klik -->
<?php
if (isset($_POST['addport'])) {
    $proj = $_POST['proj'];
    $year = $_POST['year'];
    $desc = $_POST['desc'];
    $sql = "insert into portfolio (project_name, year, description) values ('$proj', '$year', '$desc')";
    $simpan = mysqli_query($connect, $sql);

    // Bila berhasil simpan kembali fortopolio
    if ($simpan) {
        header("location:../pages/porto.php");
    } else {
        echo "<script type='text/javascript'> onload=function() { alert ('Data gagal disimpan!');}</script>";
    }
} elseif (isset($_POST['updateport'])) {
    $proj = $_POST['proj'];
    $year = $_POST['year'];
    $desc = $_POST['desc'];

    $sql = "update portfolio set project_name = '$proj', year = '$year', description = '$desc' where id_port = '$id'";
    $update = mysqli_query($connect, $sql);

    // Bila berhasil simpan kembali fortopolio
    if ($update) {
        header("location:../pages/porto.php");
    } else {
        echo "<script type='text/javascript'> onload=function() { alert ('Data gagal diupdate!');}</script>";
    }
}
?>
<script type="text/javascript">
    function Validasi() { 
        const proj = document.getElementById("projID").value;
        const projError = document.getElementById("proj-error");
        const year = document.getElementById("yearID").value;
        const yearError = document.getElementById("year-error");
        const desc = document.getElementById("descID").value; 
        const descError = document.getElementById("desc-error");

        projError.textContent = ""; 
        yearError.textContent = ""; 
        descError.textContent = "";

        let isValid = true; 
        if (proj === "" || proj.length > 50) { 
            projError.textContent = "Masukan nama proyek tidak lebih dari 50 karakter"; 
            isValid = false; 
        } 
        if (year === "" || year.length > 4) { 
            yearError.textContent = "Masukan tahun proyek tidak lebih dari 4 karakter"; 
            isValid = false; 
        } 
        if (desc === "") {
            descError.textContent = "Masukkan deskripsi proyek";
            isValid = false;
        }
        return isValid;
    }
</script>