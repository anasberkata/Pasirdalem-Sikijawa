<?php
session_start();
include "../templates/header.php";

$id = $_GET["id"];
$p = query(
    "SELECT * FROM pegawai
    INNER JOIN jabatan ON pegawai.jabatan_id = jabatan.id_jabatan
    WHERE id_pegawai = $id"
)[0];

$jabatan = query("SELECT * FROM jabatan WHERE id_jabatan NOT IN (1, 3)");

if (isset($_POST["ubah_pegawai"])) {
    if (pegawai_edit($_POST) > 0) {
        echo "<script>
            alert('Pegawai berhasil diubah!');
            document.location.href = 'pegawai.php';
          </script>";
    } else {
        echo "<script>
            alert('Pegawai gagal diubah!');
            document.location.href = 'pegawai.php';
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
                    <li class="breadcrumb-item active" aria-current="page">Pegawai</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Ubah Pegawai</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="pegawai.php" class="btn btn-primary text-white">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-md-12">NIP</label>
                                    <div class="col-md-12">

                                        <input type="hidden" value="<?= $p["id_pegawai"]; ?>"
                                            class="form-control form-control-line" name="id">

                                        <input type="number" value="<?= $p["nip"]; ?>"
                                            class="form-control form-control-line" name="nip">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-md-12">Nama Lengkap</label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?= $p["nama_pegawai"]; ?>"
                                            class="form-control form-control-line" name="nama_pegawai">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-md-12">Jenis Kelamin</label>
                                    <div class="col-md-12">
                                        <select class="form-select shadow-none form-control-line" name="jk">
                                            <option value="<?= $p["jk"]; ?>"><?= $p["jk"]; ?></option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-md-12">Jabatan</label>
                                    <div class="col-md-12">
                                        <select class="form-select shadow-none form-control-line" name="jabatan_id">
                                            <option value="<?= $p["id_jabatan"] ?>"><?= $p["jabatan"] ?>
                                            </option>
                                            <?php foreach ($jabatan as $j): ?>
                                                <option value="<?= $j["id_jabatan"] ?>"><?= $j["jabatan"] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white" type="submit"
                                    name="ubah_pegawai">Ubah</button>
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