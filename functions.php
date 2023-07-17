<?php

// KONEKSI DATABASE =====================================================
$conn = mysqli_connect("localhost", "root", "", "db_sikijawa");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function pengguna_add($data)
{
    global $conn;

    $nama = $data["nama"];
    $username = $data["username"];
    $password = $data["password"];
    $jabatan_id = 3;
    $role_id = $data["role_id"];

    $date_created = date("Y-m-d");
    $is_active = 1;

    $cek_username = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    // Cek Username Sudah Ada Atau Belum
    if (mysqli_fetch_assoc($cek_username)) {
        echo "<script>
            alert('Username Sudah Terdaftar!');
            document.location.href = 'pengguna_add.php';
            </script>";
    } else {
        $query = "INSERT INTO users
				VALUES
			(NULL, '$nama', '$username', '$password', '$jabatan_id', '$role_id', '$date_created', '$is_active')
			";

        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function pengguna_edit($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $username = $data["username"];
    $password = $data["password"];
    $role_id = $data["role_id"];

    $query = "UPDATE users SET
			nama = '$nama',
			username = '$username',
			password = '$password',
			role_id = '$role_id'

            WHERE id_user = $id
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function pengguna_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE id_user = $id");
    return mysqli_affected_rows($conn);
}

function profile_edit($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $username = $data["username"];
    $password = $data["password"];

    $query = "UPDATE users SET
			nama = '$nama',
			username = '$username',
			password = '$password'

            WHERE id_user = $id
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}


// JABATAN
function jabatan_add($data)
{
    global $conn;

    $jabatan = $data["jabatan"];
    $deskripsi = $data["deskripsi"];

    $query = "INSERT INTO jabatan
				VALUES
			(NULL, '$jabatan', '$deskripsi')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function jabatan_edit($data)
{
    global $conn;

    $id = $data["id_jabatan"];
    $jabatan = $data["jabatan"];
    $deskripsi = $data["deskripsi"];

    $query = "UPDATE jabatan SET
			jabatan = '$jabatan',
			deskripsi = '$deskripsi'

            WHERE id_jabatan = $id
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function jabatan_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM jabatan WHERE id_jabatan = $id");
    return mysqli_affected_rows($conn);
}

// PEGAWAI
function pegawai_add($data)
{
    global $conn;

    $nip = $data["nip"];
    $nama_pegawai = $data["nama_pegawai"];
    $jk = $data["jk"];
    $jabatan_id = $data["jabatan_id"];
    $status = "Aktif";

    $cek_nip = mysqli_query($conn, "SELECT nip FROM pegawai WHERE nip = '$nip'");

    // Cek nip Sudah Ada Atau Belum
    if (mysqli_fetch_assoc($cek_nip)) {
        echo "<script>
            alert('NIP Sudah Ada!');
            document.location.href = 'pegawai_add.php';
            </script>";
    } else {
        $query = "INSERT INTO pegawai
				VALUES
			(NULL, '$nip', '$nama_pegawai', '$jk', '$jabatan_id', '$status')
			";

        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function pegawai_edit($data)
{
    global $conn;

    $id = $data["id"];
    $nip = $data["nip"];
    $nama_pegawai = $data["nama_pegawai"];
    $jk = $data["jk"];
    $jabatan_id = $data["jabatan_id"];

    $query = "UPDATE pegawai SET
			nip = '$nip',
			nama_pegawai = '$nama_pegawai',
			jk = '$jk',
			jabatan_id = '$jabatan_id'

            WHERE id_pegawai = $id
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function pegawai_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai = $id");
    return mysqli_affected_rows($conn);
}


// PERIODE
function periode_add($data)
{
    global $conn;

    $bulan = $data["bulan"];
    $tahun = $data["tahun"];
    $periode = $tahun . "-" . $bulan;
    $label = $tahun . " " . $bulan;

    $cek_periode = mysqli_query($conn, "SELECT periode FROM periode WHERE periode = '$periode'");

    // Cek nip Sudah Ada Atau Belum
    if (mysqli_fetch_assoc($cek_periode)) {
        echo "<script>
            alert('Periode Tersebut Sudah Ada!');
            document.location.href = 'periode_add.php';
            </script>";
    } else {
        $query = "INSERT INTO periode
				VALUES
			(NULL, '$periode', '$label', '$tahun', '$bulan')
			";

        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function periode_edit($data)
{
    global $conn;

    $id = $data["id"];
    $bulan = $data["bulan"];
    $tahun = $data["tahun"];
    $periode = $tahun . "-" . $bulan;
    $label = $tahun . " " . $bulan;

    $query = "UPDATE periode SET
			periode = '$periode',
			label = '$label',
			tahun = '$tahun',
			bulan = '$bulan'

            WHERE id_periode = $id
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function periode_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM periode WHERE id_periode = $id");
    return mysqli_affected_rows($conn);
}

// KRITERIA
function kriteria_add($data)
{
    global $conn;

    $kriteria = $data["kriteria"];
    $deskripsi = $data["deskripsi"];
    $bobot = $data["bobot"];

    $query = "INSERT INTO kriteria
				VALUES
			(NULL, '$kriteria', '$deskripsi', '$bobot')
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function kriteria_edit($data)
{
    global $conn;

    $id = $data["id"];
    $kriteria = $data["kriteria"];
    $deskripsi = $data["deskripsi"];
    $bobot = $data["bobot"];

    $query = "UPDATE kriteria SET
			kriteria = '$kriteria',
			deskripsi = '$deskripsi',
			bobot = '$bobot'

            WHERE id_kriteria = $id
			";

    mysqli_query(
        $conn,
        $query
    );

    return mysqli_affected_rows($conn);
}

function kriteria_delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM kriteria WHERE id_kriteria = $id");
    return mysqli_affected_rows($conn);
}

// PENILAIAN
function inputPenilaian($periodeId, $pegawaiId, $kriteriaId, $nilai_input, $nilai_skor, $nilai_preferensi)
{
    global $conn;

    $query = "INSERT INTO nilai VALUES (NULL, '$pegawaiId', '$kriteriaId', '$nilai_input', $nilai_skor, $nilai_preferensi, '$periodeId')";

    if (mysqli_query($conn, $query)) {
        $_SESSION["penilaian_saved"] = true; // Menyimpan flag data berhasil disimpan
    } else {
        $_SESSION["penilaian_saved"] = false; // Menyimpan flag data gagal disimpan
    }
}

function inputAlternatif($pegawaiId, $periodeId, $nilaiAHP)
{
    global $conn;

    $query = "INSERT INTO alternatif VALUES (NULL, '$pegawaiId', '$periodeId', '$nilaiAHP')";
    mysqli_query($conn, $query);
}

function ranking_reset($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM alternatif WHERE periode_id = $id");
    mysqli_query($conn, "DELETE FROM nilai WHERE periode_id = $id");

    return mysqli_affected_rows($conn);
}