<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id = $_GET["id"];

if (pengguna_delete($id) > 0) {
    echo "
		<script>
			alert('Pengguna berhasil dihapus!');
			document.location.href = 'pengguna.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Pengguna gagal dihapus!');
			document.location.href = pengguna.php';
		</script>

	";
}