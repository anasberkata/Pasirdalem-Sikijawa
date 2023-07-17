<?php
session_start();

include "../templates/header.php";

$pegawai = query("SELECT * FROM pegawai");
$periode = query("SELECT * FROM periode");
$alternatif = query("SELECT * FROM alternatif");
// $rv_amount = query("SELECT SUM(jumlah) AS amount FROM rv_detail")[0];

$total_pegawai = count($pegawai);
$total_periode = count($periode);
$total_alternatif = count($alternatif);
?>


<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Dashboard</h1>
        </div>
        <!-- <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/"
                    class="btn btn-primary text-white" target="_blank">Upgrade to Pro</a>
            </div>
        </div> -->
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="btn btn-primary btn-circle d-flex align-items-center">
                            <i class="mdi mdi-account fs-4"></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Pegawai</h5>
                            <span class="text-muted fs-6">Total Pegawai</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">
                                <?= $total_pegawai; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="btn btn-success text-white btn-circle d-flex align-items-center">
                            <i class="mdi mdi-timetable fs-4"></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Periode</h5>
                            <span class="text-muted fs-6">Total Periode</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">
                                <?= $total_periode; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="btn btn-danger text-white btn-circle d-flex align-items-center">
                            <i class="mdi mdi-bookmark-check fs-4"></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Penilaian</h5>
                            <span class="text-muted fs-6">Total Penilaian</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light text-muted">
                                <?= $total_alternatif; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>