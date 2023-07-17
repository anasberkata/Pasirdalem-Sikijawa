<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: view_admin/dashboard.php");
    exit;
}

include "templates/auth_header.php";
?>

<div class="container-fluid pt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center">
                    <img src="assets/images/logo-sugih-mukti.png" width="20%">
                    <h5 class="card-title my-3">Sistem Penilaian Kinerja Pegawai</h5>
                    <h5 class="card-subtitle">Desa Pasir Dalem</h5>
                </div>
                <div class="card-body">

                    <?php if (isset($_GET["pesan"])): ?>
                        <p class="alert alert-danger" style="font-style: italic; color: red; text-align: center;">
                            <?= $_GET["pesan"]; ?>
                        </p>
                    <?php endif; ?>

                    <form class="form-horizontal form-material mx-2" action="cek_login.php" method="POST">
                        <div class="form-group">
                            <label class="col-md-12">Username</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Username" class="form-control form-control-line"
                                    name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" placeholder="password" class="form-control form-control-line"
                                    name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white w-100">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "templates/auth_footer.php";
?>