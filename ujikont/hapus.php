<?php  
	include 'conn.php';
	$id = $_GET['id'];
	$query = mysqli_query($conn, "DELETE FROM murid WHERE id_murid = '$id'");

	if ($query) {
		header("Location: index.php?berhasil");
	} else {
		header("Location: index.php?gagal");
	}
?>