<?php

// require_once __DIR__ . '/vendor/autoload.php';
require_once '../vendor/autoload.php';
require '../functions.php';

$id_prd = $_GET["id_periode"];

$periode = query("SELECT * FROM periode");
$kriteria = query("SELECT * FROM kriteria");

$html = '
<table width=100% style="margin-bottom: 30px;">

    <tr>
        <td width="33.3%" style="text-align: center;">
            <img src="../assets/images/logo-sugih-mukti.png" width="10%">
        </td>
        <td width="33.4%" style="text-align: center;">
            <h3>PEMERINTAH KABUPATEN CIANJUR</h3>
            <h3>KECAMATAN KADUPANDAK</h3>
            <h4>DESA PASIRDALEM</h4>
            <p>Alamat: Jalan Raya Pasirdalem No. 01 <br> Desa Pasirdalem Kec. Kadupandak Kab, Cianjur Kode Pos : 43268</p>
        </td>
        <td width="33.3%"></td>
    </tr>

</table>

<table width=100%>
    <tr>
        <td width="33.3%"></td>
        <td width="33.4%" style="text-align: center;">
        <h3>PENILAIAN KINERJA PEGAWAI</h3>';

$per = query("SELECT * FROM periode WHERE id_periode = $id_prd")[0];

$html .= 'Periode : ' . $per["label"] . '
        </td>
        <td width="33.3%"></td>
    </tr>
</table>

<h4>Statement Penilaian</h4>
<table width=100% border=1 cellpadding=10 cellspacing=0 style="font-size: 9pt;">
    <tr>
        <td>No</td>
        <td>NIP</td>
        <td>Nama</td>';

foreach ($kriteria as $k) {
    $html .= '<td>' . $k["kriteria"] . '</td></tr>';
}

$i = 1;
$alternatif = query("SELECT * FROM alternatif INNER JOIN pegawai ON alternatif.pegawai_id = pegawai.id_pegawai WHERE periode_id = $id_prd");

foreach ($alternatif as $a) {
    $html .= '<tr>
        <td>' . $i . '</td>
        <td>' . $a["nip"] . '</td>
        <td>' . $a["nama_pegawai"] . '</td>';

    $nilai = query("SELECT * FROM nilai WHERE pegawai_id = {$a['pegawai_id']} AND periode_id = $id_prd");

    foreach ($nilai as $n) {
        $html .= '<td>' . $n["nilai_input"] . '</td>';
    }

    $html .= '</tr>';
    $i++;
}
$html .=
    '</table>

    <hr>
<h4>Penilaian Akhir</h4>
<h6>Metode AHP</h6>
<table width=100% border=1 cellpadding=10 cellspacing=0 style="font-size: 9pt;">
    <tr>
        <td>No</td>
        <td>NIP</td>
        <td>Nama</td>';

foreach ($kriteria as $k) {
    $html .= '<td>' . $k["kriteria"] . '</td></tr>';
}
$html .= '<td>Nilai AHP</td>
        <td>Index Lieker</td>
    </tr>';

$i = 1;
$alternatif = query("SELECT * FROM alternatif INNER JOIN pegawai ON alternatif.pegawai_id = pegawai.id_pegawai WHERE periode_id = $id_prd ORDER BY nilai_alternatif DESC");

foreach ($alternatif as $a) {
    $html .= '<tr>
    <td>' . $i . '</td>
    <td>' . $a["nip"] . '</td>
    <td>' . $a["nama_pegawai"] . '</td>';

    $nilai = query("SELECT * FROM nilai WHERE pegawai_id = {$a['pegawai_id']} AND periode_id = $id_prd");

    foreach ($nilai as $n) {
        $html .= '<td>' . $n["nilai_preferensi"] . '</td>';
    }

    $html .= '<td>' . $a["nilai_alternatif"] . '</td>
    <td>';

    if ($a["nilai_alternatif"] < 6) {
        $html .= 'Sangat Kurang';
    } elseif ($a["nilai_alternatif"] >= 6 and $a["nilai_alternatif"] < 10) {
        $html .= 'Kurang';
    } elseif ($a["nilai_alternatif"] >= 10 and $a["nilai_alternatif"] < 14) {
        $html .= 'Sedang';
    } elseif ($a["nilai_alternatif"] >= 14 and $a["nilai_alternatif"] < 18) {
        $html .= 'Baik';
    } elseif ($a["nilai_alternatif"] >= 18) {
        $html .= 'Sangat Baik';
    }

    $html .= '</td>
    </tr>';
    $i++;
}

$html .= '</table>
';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);

// $stylesheet = file_get_contents('style_print.css');
// $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML("$html", \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output('Penilaian Pegawai Periode ' . '.pdf', 'I');
// $mpdf->Output();