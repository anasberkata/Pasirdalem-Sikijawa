<?php
session_start();

include "../templates/header.php";

$periode = query("SELECT * FROM periode");
$kriteria = query("SELECT * FROM kriteria");

if (isset($_POST["simpan_nilai"])) {

    $pegawaiId = $_POST["pegawai_id"];
    $periodeId = $_POST["periode_id"];

    // Variabel untuk menyimpan total nilai preferensi
    $nilai_ahp = 0;

    // Looping untuk menginput data penilaian untuk setiap kriteria
    foreach ($_POST["kriteria_id"] as $index => $kriteriaId) {
        $nilai_input = $_POST["nilai_input"][$index];
        $nilai_skor = $nilai_input / 5;

        // Mengambil bobot kriteria dari tabel kriteria
        $bobot = 0;
        foreach ($kriteria as $k_data) {
            if ($k_data["id_kriteria"] == $kriteriaId) {
                $bobot = $k_data["bobot"];
                break;
            }
        }

        $nilai_preferensi = $nilai_skor * $bobot;
        // Menambahkan nilai preferensi ke total nilai preferensi
        $nilai_ahp += $nilai_preferensi;

        inputPenilaian($periodeId, $pegawaiId, $kriteriaId, $nilai_input, $nilai_skor, $nilai_preferensi);
    }

    // Memasukkan hasil AHP ke dalam tabel alternatif
    inputAlternatif($pegawaiId, $periodeId, $nilai_ahp);
}
?>

<?php if (isset($_SESSION["penilaian_saved"]) && $_SESSION["penilaian_saved"]): ?>
    <script>
        alert('Penilaian berhasil disimpan!');
        <?php unset($_SESSION["penilaian_saved"]); // Hapus flag setelah alert muncul ?>
    </script>
<?php endif; ?>



<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                class="mdi mdi-home-outline fs-4"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Penilaian</li>
                </ol>
            </nav>
            <h1 class="mb-0 fw-bold">Penilaian</h1>
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
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material mx-2" action="" method="POST">
                            <div class="form-group">
                                <label class="col-md-12">Periode</label>
                                <div class="col-md-12">

                                    <?php
                                    $label = $_POST["label"];
                                    $p = query("SELECT * FROM periode WHERE id_periode = $label")[0];
                                    ?>

                                    <input type="hidden" value="<?= $p["id_periode"] ?>"
                                        class="form-control form-control-line" name="periode_id">
                                    <input type="text" value="<?= $p["label"] ?>" class="form-control form-control-line"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Alternatif</label>
                                <div class="col-md-12">

                                    <?php
                                    $alternatif = query("SELECT * FROM pegawai WHERE id_pegawai NOT IN (SELECT pegawai_id FROM nilai WHERE periode_id = {$p['id_periode']})");
                                    ?>

                                    <select class="form-select shadow-none form-control-line" name="pegawai_id">
                                        <option>Pilih Alternatif</option>
                                        <?php foreach ($alternatif as $a): ?>
                                            <option value="<?= $a["id_pegawai"] ?>"><?= $a["nama_pegawai"] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <hr>
                            <h4 class="fw-bold mb-2">Penilaian</h4>
                            <span class="small mb-2"><b>*(Skala 1 s/d 5, 1 nilai terendah dan 5
                                    nilai tertinggi)</b></span>

                            <?php foreach ($kriteria as $k): ?>
                                <div class="form-group">
                                    <label class="col-md-12">
                                        <?= $k["kriteria"]; ?>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="hidden" class="form-control form-control-line"
                                            value="<?= $k["id_kriteria"]; ?>" name="kriteria_id[]">

                                        <input type="number" min="1" max="5" placeholder="Min: 1 dan Max: 5"
                                            class="form-control form-control-line" name="nilai_input[]">
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success text-white" type="submit"
                                        name="simpan_nilai">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
include "../templates/footer.php";
?>