<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

require "../functions.php";

$id = $_GET["id"];

if (periode_delete($id) > 0) {
    echo "
		<script>
			alert('Periode berhasil dihapus!');
			document.location.href = 'periode.php';
		</script>
	";
} else {
    echo "
		<script>
			alert('Periode gagal dihapus!');
			document.location.href = periode.php';
		</script>

	";
}