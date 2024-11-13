<?php
    if (!isset($_SESSION["U"]) || (!isset($_SESSION["P"]))) {
        $btn_status = "hidden";
        $hr = "";
    } else {
        $btn_status = "";
        $hr = "<hr>";
    }
    include ("../configs/koneksi.php");
    $sql = mysqli_query($connect, "select * from user");
    // $data = mysqli_fetch_array($sql);
?>

<button class="btn btn-info" type="button" <?php echo $btn_status; ?> onclick="location.href='user-man-form.php?id'">Add User</button>
<?php echo $hr; ?>

<table class="table table-stripped">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Aksi</th>
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
                    <td><?php echo $data['username']; ?></td>
                    <td <?php echo $btn_status; ?>>
                        <a href="../pages/user-man-form.php?id=<?php echo $data['id_user']; ?>">Edit</a>
                        |
                        <a href="../layouts/content-userman-delete.php?id=<?php echo $data['id_user']; ?>" onclick="return KonfirmasiHapus()">Delete</a>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
            <?php $nomor++; } ?>
</table>
<script type="text/javascript">
    function KonfirmasiHapus() {
        return confirm("Apakah Anda yakin ingin menghapus user ini?");
    }
</script>