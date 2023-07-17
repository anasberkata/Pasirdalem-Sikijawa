<?php
session_start();
include "../templates/header.php";

$id = $_GET["id"];
$j = query(
    "SELECT * FROM jabatan
    WHERE id_jabatan = $id"
)[0];

if (isset($_POST["ubah_jabatan"])) {
    if (jabatan_edit($_POST) > 0) {
        echo "<script>
            alert('Jabatan berhasil diubah!');
            document.location.href = 'jabatan.php';
          </script>";
    } else {
        echo "<script>
            alert('Jabatan gagal diubah!');
            document.location.href = 'jabatan.php';
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
                    <li class="breadcrumb-item active" aria-current="page">Jabatan</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Ubah Jabatan</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="jabatan.php" class="btn btn-primary text-white">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="" method="POST">
                        <div class="form-group">
                            <label class="col-md-12">Nama Jabatan</label>
                            <div class="col-md-12">
                                <input type="hidden" value="<?= $j["id_jabatan"]; ?>" name="id_jabatan">
                                <input type="text" value="<?= $j["jabatan"]; ?>" class="form-control form-control-line"
                                    name="jabatan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Deskripsi Jabatan</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line ckeditor" id="ckeditor"
                                    name="deskripsi"><?= $j["deskripsi"]; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white" type="submit"
                                    name="ubah_jabatan">Ubah</button>
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