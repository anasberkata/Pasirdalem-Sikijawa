<?php
session_start();

include "../templates/header.php";

$users = query(
    "SELECT * FROM users
    INNER JOIN jabatan ON users.jabatan_id = jabatan.id_jabatan
    INNER JOIN users_role ON users.role_id = users_role.id_role"
);
?>


<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Pengguna</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <a href="pengguna_add.php" class="btn btn-primary text-white">Tambah</a>
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($users as $u): ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $i; ?>
                                        </th>
                                        <td>
                                            <?= $u["nama"]; ?>
                                        </td>
                                        <td>
                                            <?= $u["username"]; ?>
                                        </td>
                                        <td>
                                            <?= $u["jabatan"]; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <a href="pengguna_edit.php?id=<?= $u["id_user"] ?>"
                                                    class="btn btn-info text-white"><i class="mdi mdi-pencil"></i></a>
                                                <a href="pengguna_delete.php?id=<?= $u["id_user"] ?>"
                                                    class="btn btn-danger text-white"
                                                    onclick="return confirm('Yakin ingin menghapus <?= $u['nama']; ?>?');"><i
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