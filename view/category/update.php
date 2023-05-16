<?php
include_once("../../config/database.php");

session_start();

if ($_SESSION['username'] == "") {
    header('location:../index.php');
}

$queryId = $_GET["id"];

include_once("../inc/header.php");

if (isset($_POST['update'])) {
    $category = $_POST['kategori'];

    $sql = "UPDATE tb_category SET nm_cat='$category' WHERE id=$queryId";
    $result = $pdo->query($sql);

    if ($result) {
        echo "<script> alert('Data Berhasil Ditambah')</script>";
    } else {
        echo "<script> alert('Data Tidak Berhasil Ditambah')</script>";
    }
}

?>

<?php

include_once("../inc/admin_sidebar.php");
?>

<div class="content-wrapper">
    <?php
    $sql = "SELECT * FROM tb_category WHERE id='$queryId'";
    $stmt = $pdo->query($sql);
    while ($rows = $stmt->fetch()) {
        $data_nama = $rows["nm_cat"];
    }
    ?>
    <!-- Content Header (Page header) -->

    <section class=" content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title">Tambah kategori</h3>
                        </div>
                        <!-- /.card-header -->
                        <form method="POST" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="katInput">Nama Kategori</label>
                                    <input type="text" class="form-control" id="katInput" name="kategori" value="<?= $data_nama ?>">
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div>
                                <div class="card-footer">
                                    <button type="submit" name="update" class="btn btn-primary">update</button>
                                    <a href="index.php" class="btn btn-info">kembali</a>

                                </div>
                        </form>
                    </div>

                    <!-- /.row -->
                    <!-- /.container-fluid -->
                </div>
            </div>
        </div>

    </section>
</div>



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->