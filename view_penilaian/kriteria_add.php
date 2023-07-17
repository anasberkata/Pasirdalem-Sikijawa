<?php
session_start();
include "../templates/header.php";

if (isset($_POST["tambah_kriteria"])) {
    if (kriteria_add($_POST) > 0) {
        echo "<script>
            alert('Kriteria berhasil ditambah!');
            document.location.href = 'kriteria.php';
          </script>";
    } else {
        echo "<script>
            alert('Kriteria gagal ditambah!');
            document.location.href = 'kriteria.php';
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
                    <li class="breadcrumb-item active" aria-current="page">Kriteria</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Tambah Kriteria</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="kriteria.php" class="btn btn-primary text-white">Kembali</a>
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
                            <label class="col-md-12">Kriteria</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Kriteria" class="form-control form-control-line"
                                    name="kriteria">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Deskripsi Kriteria</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line ckeditor" id="ckeditor"
                                    placeholder="Deskripsi" name="deskripsi"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Bobot Kriteria <span class="small"><b>*(Skala 1 s/d 5, 1
                                        tingkat
                                        kepentingan terendah dan 5
                                        tingkat kepentingan
                                        tertinggi)</b></span></label>
                            <div class="col-md-12">
                                <input type="number" min="1" max="5" placeholder="Min : 1 dan Max : 5"
                                    class="form-control form-control-line" name="bobot">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white" type="submit"
                                    name="tambah_kriteria">Tambah</button>
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