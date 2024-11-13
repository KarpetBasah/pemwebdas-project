<?php
include ("../configs/koneksi.php");

$id = $_GET['id'];

$sql = mysqli_query($connect, "select * from user where id_user = '$id'");
$data = mysqli_fetch_array($sql);
if ($id == "") {
    $idusr = "hidden";
    $actbtn = "addport";
    $actval = "Save Data";
} else {
    $idusr = "readonly";
    $actbtn = "updateport";
    $actval = "Update Data";
}
?>
<!-- User Manager Form -->
<form name="usermanform" method="post" action="" onsubmit="return Validasi()">
    <div class="form-group" <?php echo $idusr; ?>>
        <label for="portID">User ID</label>
        <input type="text" class="form-control" name="usr" id="usrID" value="<?php echo $data['id_user']; ?>">
    </div>
    <div class="form-group">
        <label for="usrnameID">Nama</label>
        <input type="text" class="form-control" name="usrname" id="usrnameID" value="<?php if ($id != "") {
            echo $data['name'];
        } ?>"
            placeholder="Nama User">
        <span id="usrname-error" class="error-message"></span>
    </div>
    <div class="form-group">
        <label for="usernameID">Username</label>
        <input type="text" class="form-control" name="username" id="usernameID" value="<?php if ($id != "") {
            echo $data['username'];
        } ?>"
            placeholder="Username">
        <span id="username-error" class="error-message"></span>
    </div>
    <div class="form-group">
        <label for="pssID">Password</label>
        <input type="text" class="form-control" name="pss" id="pssID" value="<?php if ($id != "") {
            echo md5($data['username']);
        } ?>"
            placeholder="Password">
        <span id="pss-error" class="error-message"></span>
    </div>
    <div class="form-group">
        <input type="submit" name="<?php echo $actbtn; ?>" class="btn btn-info" value="<?php echo $actval; ?>">
        <input type="submit" class="btn btn-secondary" value="Reset Data">
        <input type="button" class="btn btn-secondary" onclick="location.href='../pages/user-man.php';" value="Back">
    </div>

</form>
<!-- End of User Manager form -->
<!-- Jika submit button di klik -->
<?php
if (isset($_POST['addport'])) {
    $usrname = $_POST['usrname'];
    $username = $_POST['username'];
    $pss = $_POST['pss'];
    $sql = "insert into user (name, username, password) values ('$usrname', '$username', '$pss')";
    $simpan = mysqli_query($connect, $sql);

    // Bila berhasil simpan kembali user
    if ($simpan) {
        header("location:../pages/user-man.php");
    } else {
        echo "<script type='text/javascript'> onload=function() { alert ('Data gagal disimpan!');}</script>";
    }
} elseif (isset($_POST['updateport'])) {
    $usrname = $_POST['usrname'];
    $username = $_POST['username'];
    $pss = $_POST['pss'];

    $sql = "update user set name = '$usrname', username = '$username', password = '$pss' where id_user = '$id'";
    $update = mysqli_query($connect, $sql);

    // Bila berhasil simpan kembali user
    if ($update) {
        header("location:../pages/user-man.php");
    } else {
        echo "<script type='text/javascript'> onload=function() { alert ('Data gagal diupdate!');}</script>";
    }
}
?>
<script type="text/javascript">
    function Validasi() { 
        const usrname = document.getElementById("usrnameID").value;
        const usrnameError = document.getElementById("usrname-error");
        const username = document.getElementById("usernameID").value;
        const usernameError = document.getElementById("username-error");
        const pss = document.getElementById("pssID").value; 
        const pssError = document.getElementById("pss-error");

        usrnameError.textContent = ""; 
        usernameError.textContent = ""; 
        pssError.textContent = "";

        let isValid = true; 
        if (usrname === "" || proj.length > 20) { 
            usrnameError.textContent = "Masukan nama tidak lebih dari 20 karakter"; 
            isValid = false; 
        } 
        if (username === "" || year.length > 10) { 
            usernameError.textContent = "Masukan username tidak lebih dari 10 karakter"; 
            isValid = false; 
        } 
        if (pss === "") {
            pssError.textContent = "Masukkan password";
            isValid = false;
        }
        return isValid;
    }
</script>