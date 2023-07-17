<?php
session_start();

include "../templates/header.php";

$pegawai = query(
    "SELECT * FROM pegawai
    INNER JOIN jabatan ON pegawai.jabatan_id = jabatan.id_jabatan"
);
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
            <h1 class="mb-0 fw-bold">Pegawai</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="pegawai_add.php" class="btn btn-primary text-white">Tambah</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pegawai as $p): ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $i; ?>
                                        </th>
                                        <td>
                                            <?= $p["nip"]; ?>
                                        </td>
                                        <td>
                                            <?= $p["nama_pegawai"]; ?>
                                        </td>
                                        <td>
                                            <?= $p["jk"]; ?>
                                        </td>
                                        <td>
                                            <?= $p["jabatan"]; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <a href="pegawai_edit.php?id=<?= $p["id_pegawai"] ?>"
                                                    class="btn btn-info text-white"><i class="mdi mdi-pencil"></i></a>
                                                <a href="pegawai_delete.php?id=<?= $p["id_pegawai"] ?>"
                                                    class="btn btn-danger text-white"
                                                    onclick="return confirm('Yakin ingin menghapus <?= $p['nama_pegawai']; ?>?');"><i
                                                        class="mdi mdi-delete"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>