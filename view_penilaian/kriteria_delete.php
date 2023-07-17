<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id = $_GET["id"];

if (kriteria_delete($id) > 0) {
    echo "
		<script>
			alert('Kriteria berhasil dihapus!');
			document.location.href = 'kriteria.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Kriteria gagal dihapus!');
			document.location.href = kriteria.php';
		</script>

	";
}