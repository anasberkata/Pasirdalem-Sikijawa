<?php
session_start();
include "../templates/header.php";

$id = $_GET["id"];
$p = query(
    "SELECT * FROM periode
    WHERE id_periode = $id"
)[0];

if (isset($_POST["ubah_periode"])) {
    if (periode_edit($_POST) > 0) {
        echo "<script>
            alert('Periode berhasil diubah!');
            document.location.href = 'periode.php';
          </script>";
    } else {
        echo "<script>
            alert('Periode gagal diubah!');
            document.location.href = 'periode.php';
          </script>";
    }
}

?>

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Periode</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Ubah Periode</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="periode.php" class="btn btn-primary text-white">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="" method="POST">
                        <div class="form-group">
                            <label class="col-md-12">Bulan</label>
                            <div class="col-md-12">
                                <input type="hidden" value="<?= $p["id_periode"]; ?>" name="id">

                                <select class="form-select shadow-none form-control-line" name="bulan">
                                    <option value="<?= $p["bulan"]; ?>"><?= $p["bulan"]; ?></option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Tahun</label>
                            <div class="col-md-12">
                                <input type="number" min="2018" max="2500" value="<?= $p["tahun"]; ?>"
                                    class="form-control form-control-line" name="tahun">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white" type="submit"
                                    name="ubah_periode">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>