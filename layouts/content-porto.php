<!-- Content Fortpolio -->
<?php
    if (!isset($_SESSION["U"]) || (!isset($_SESSION["P"]))) {
        $btn_status = "hidden";
        $hr = "";
    } else {
        $btn_status = "";
        $hr = "<hr>";
    }
    include ("../configs/koneksi.php");
    $sql = mysqli_query($connect, "select * from portfolio");
    // $data = mysqli_fetch_array($sql);
?>

<button class="btn btn-info" type="button" <?php echo $btn_status; ?> onclick="location.href='porto-form.php?id'">Add Data</button>
<?php echo $hr; ?>

<table class="table table-stripped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Project Name</th>
            <th scope="col">Year</th>
            <th scope="col">Description</th>
            <th scope="col" <?php echo $btn_status; ?>>Action</th>
        </tr>
    </thead>

    <?php
        $nomor = 1;
        while ($data = mysqli_fetch_array($sql)) { ?>
            <tbody>
                <tr>
                    <td scope="row"><?php echo $nomor; ?></td>
                    <td><?php echo $data['project_name']; ?></td>
                    <td><?php echo $data['year']; ?></td>
                    <td><?php echo $data['description']; ?></td>
                    <td <?php echo $btn_status; ?>>
                        <a href="../pages/porto-form.php?id=<?php echo $data['id_port']; ?>">Edit</a>
                        |
                        <a href="../layouts/content-porto-delete.php?id=<?php echo $data['id_port']; ?>" onclick="return KonfirmasiHapus()">Delete</a>
                    </td>
                </tr>
            </tbody>
            <?php $nomor++; } ?>
</table>

<script type="text/javascript">
    function KonfirmasiHapus() {
        return confirm("Apakah Anda yakin ingin menghapus portofolio ini?");
    }
</script>
<!-- End of Content Fortpolio -->