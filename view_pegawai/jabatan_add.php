<?php
session_start();
include "../templates/header.php";

if (isset($_POST["tambah_jabatan"])) {
    if (jabatan_add($_POST) > 0) {
        echo "<script>
            alert('Jabatan berhasil ditambah!');
            document.location.href = 'jabatan.php';
          </script>";
    } else {
        echo "<script>
            alert('Jabatan gagal ditambah!');
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
            <h1 class="mb-0 fw-bold">Tambah Jabatan</h1>
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
                                <input type="text" placeholder="Nama Jabatan" class="form-control form-control-line"
                                    name="jabatan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Deskripsi Jabatan</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line ckeditor" id="ckeditor"
                                    placeholder="Deskripsi" name="deskripsi"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white" type="submit"
                                    name="tambah_jabatan">Tambah</button>
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