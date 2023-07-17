<?php
session_start();

include "../templates/header.php";

$periode = query("SELECT * FROM periode");
$kriteria = query("SELECT * FROM kriteria");
?>

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ranking</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Ranking</h1>
        </div>
        <div class="col-6">
            <div class="text-end upgrade-btn">
                <form class="form-horizontal form-material mx-2" action="" method="POST">
                    <div class="form-group row">
                        <label class="col-md-3 pt-1 text-start">Periode : </label>
                        <div class="col-md-7 mb-2">
                            <select class="form-select shadow-none form-control-line" name="label">
                                <?php foreach ($periode as $p): ?>
                                    <option value="<?= $p["id_periode"] ?>"><?= $p["label"] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success text-white w-100" type="submit" name="cari_periode"><i
                                    class="mdi mdi-magnify"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($_POST["label"])): ?>

                <?php
                $prd = $_POST["label"];
                $cek_alternatif = mysqli_query($conn, "SELECT periode_id FROM alternatif WHERE periode_id = '$prd'");

                if (mysqli_fetch_assoc($cek_alternatif)): ?>
                    <div class="row mb-3">
                        <div class="col text-start">
                            <a href="ranking_print.php?id_periode=<?= $_POST["label"]; ?>" class="btn btn-primary"
                                target="_blank"><i class="mdi mdi-printer"></i> Print</a>
                        </div>
                        <div class="col text-center mb-3">
                            <?php
                            $id_prd = $_POST["label"];
                            $per = query("SELECT * FROM periode WHERE id_periode = $id_prd")[0];
                            ?>
                            <h5 class="">Periode :
                                <?= $per["label"] ?>
                            </h5>
                        </div>
                        <div class="col text-end">
                            <a href="ranking_reset.php?id_periode=<?= $_POST["label"]; ?>" class="btn btn-danger text-white"
                                onclick="return confirm('Yakin ingin me-reset penilaian ini?');"><i class="mdi mdi-delete"></i>
                                Reset Data</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Statement Penilaian</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nip</th>
                                            <th scope="col">Nama</th>

                                            <?php foreach ($kriteria as $k): ?>
                                                <th scope="col">
                                                    <?= $k["kriteria"]; ?>
                                                </th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $alternatif = query("SELECT * FROM alternatif INNER JOIN pegawai ON alternatif.pegawai_id = pegawai.id_pegawai WHERE periode_id = $id_prd");

                                        foreach ($alternatif as $a):
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $i; ?>
                                                </td>
                                                <td>
                                                    <?= $a["nip"]; ?>
                                                </td>
                                                <td>
                                                    <?= $a["nama_pegawai"]; ?>
                                                </td>

                                                <?php
                                                $nilai = query("SELECT * FROM nilai WHERE pegawai_id = {$a['pegawai_id']} AND periode_id = $id_prd");
                                                foreach ($nilai as $n):
                                                    ?>
                                                    <td>
                                                        <?= $n["nilai_input"]; ?>
                                                    </td>
                                                <?php endforeach; ?>

                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Penilaian Akhir</h5>
                            <span class="small">Metode AHP</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nip</th>
                                            <th scope="col">Nama</th>

                                            <?php foreach ($kriteria as $k): ?>
                                                <th scope="col">
                                                    <?= $k["kriteria"]; ?>
                                                </th>
                                            <?php endforeach; ?>

                                            <th scope="col">Nilai AHP</th>
                                            <th scope="col">Index Lieker</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $alternatif = query("SELECT * FROM alternatif INNER JOIN pegawai ON alternatif.pegawai_id = pegawai.id_pegawai WHERE periode_id = $id_prd ORDER BY nilai_alternatif DESC");

                                        foreach ($alternatif as $a):
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $i; ?>
                                                </td>
                                                <td>
                                                    <?= $a["nip"]; ?>
                                                </td>
                                                <td>
                                                    <?= $a["nama_pegawai"]; ?>
                                                </td>

                                                <?php
                                                $nilai = query("SELECT * FROM nilai WHERE pegawai_id = {$a['pegawai_id']} AND periode_id = $id_prd");
                                                foreach ($nilai as $n):
                                                    ?>
                                                    <td>
                                                        <?= $n["nilai_preferensi"]; ?>
                                                    </td>
                                                <?php endforeach; ?>

                                                <td>
                                                    <?= $a["nilai_alternatif"]; ?>
                                                </td>

                                                <td>
                                                    <?php
                                                    if ($a["nilai_alternatif"] < 6) {
                                                        $stats = "<label class='badge bg-danger'>Sangat Kurang</label>";
                                                    } elseif ($a["nilai_alternatif"] >= 6 and $a["nilai_alternatif"] < 10) {
                                                        $stats = "<label class='badge bg-danger'>Kurang</label>";
                                                    } elseif ($a["nilai_alternatif"] >= 10 and $a["nilai_alternatif"] < 14) {
                                                        $stats = "<label class='badge bg-primary'>Sedang</label>";
                                                    } elseif ($a["nilai_alternatif"] >= 14 and $a["nilai_alternatif"] < 18) {
                                                        $stats = "<label class='badge bg-info'>Baik</label>";
                                                    } elseif ($a["nilai_alternatif"] >= 18) {
                                                        $stats = "<label class='badge bg-success'>Sangat Baik</label>";
                                                    }
                                                    echo "$stats";
                                                    ?>
                                                </td>

                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <script>
                        alert('Data penilaian belum ada! Silahkan mengisi form penilaian.');
                        document.location.href = 'penilaian.php';
                    </script>
                <?php endif; ?>

            <?php endif; ?>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>