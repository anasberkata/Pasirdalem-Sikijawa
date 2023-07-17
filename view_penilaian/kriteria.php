<?php
session_start();

include "../templates/header.php";

$kriteria = query(
    "SELECT * FROM kriteria"
);
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
            <h1 class="mb-0 fw-bold">Kriteria</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="kriteria_add.php" class="btn btn-primary text-white">Tambah</a>
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
                                    <th scope="col">Kriteria</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kriteria as $k): ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $i; ?>
                                        </th>
                                        <td>
                                            <?= $k["kriteria"]; ?>
                                        </td>
                                        <td>
                                            <?= $k["deskripsi"]; ?>
                                        </td>
                                        <td>
                                            <?= $k["bobot"]; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <a href="kriteria_edit.php?id=<?= $k["id_kriteria"] ?>"
                                                    class="btn btn-info text-white"><i class="mdi mdi-pencil"></i></a>
                                                <a href="kriteria_delete.php?id=<?= $k["id_kriteria"] ?>"
                                                    class="btn btn-danger text-white"
                                                    onclick="return confirm('Yakin ingin menghapus kriteria : <?= $k['kriteria']; ?>?');"><i
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