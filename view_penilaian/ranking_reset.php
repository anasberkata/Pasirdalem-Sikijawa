<?php
session_start();

if (!isset($_SESSION['login'])) {
	header("Location: ../index.php");
	exit;
}

require "../functions.php";

$id_periode = $_GET["id_periode"];

if (ranking_reset($id_periode) > 0) {
	echo "
		<script>
			alert('Penilaian berhasil direset!');
			document.location.href = 'ranking.php?id=' + $id_periode;
		</script>
	";
} else {
	echo "
		<script>
			alert('Penilaian gagal direset!');
			document.location.href = 'ranking.php?id=' + $id_periode;
		</script>

	";
}