<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id = $_GET["id"];

if (jabatan_delete($id) > 0) {
    echo "
		<script>
			alert('Jabatan berhasil dihapus!');
			document.location.href = 'jabatan.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Jabatan gagal dihapus!');
			document.location.href = jabatan.php';
		</script>

	";
}