<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id = $_GET["id"];

if (pegawai_delete($id) > 0) {
    echo "
		<script>
			alert('Pegawai berhasil dihapus!');
			document.location.href = 'pegawai.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Pegawai gagal dihapus!');
			document.location.href = pegawai.php';
		</script>

	";
}