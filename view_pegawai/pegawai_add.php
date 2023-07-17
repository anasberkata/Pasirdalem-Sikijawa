<?php
session_start();
include "../templates/header.php";

$jabatan = query("SELECT * FROM jabatan WHERE id_jabatan NOT IN (1, 3)");

if (isset($_POST["tambah_pegawai"])) {
    if (pegawai_add($_POST) > 0) {
        echo "<script>
            alert('Pegawai berhasil ditambah!');
            document.location.href = 'pegawai.php';
          </script>";
    } else {
        echo "<script>
            alert('Pegawai gagal ditambah!');
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
            <h1 class="mb-0 fw-bold">Tambah Pegawai</h1>
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
                                        <input type="number" placeholder="Nomor Induk Pegawai"
                                            class="form-control form-control-line" name="nip">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-md-12">Nama Lengkap</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Nama Lengkap"
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
                                    name="tambah_pegawai">Tambah</button>
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