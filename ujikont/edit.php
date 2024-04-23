<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
	<h1>Edit Data Murid</h1>
	<?php
		include 'conn.php';
		$query2 = mysqli_query($conn, "SELECT * FROM murid JOIN jurusan ON jurusan.id_jurusan = murid.id_jurusan");

		if (isset($_POST['submit'])) {
			$id = $_GET['id'];
			$nama = $_POST['nama'];
			$kelas = $_POST['kelas'];
			$jurusan = $_POST['jurusan'];

			$query = mysqli_query($conn, "UPDATE murid SET id_jurusan='$jurusan', nama='$nama', kelas='$kelas' WHERE id_murid = '$id'");


			if ($query) {
				header("Location: index.php?berhasil");
			} else{
				header("Location: index.php?gagal");
			}
		}

	?>
	<form method="POST">
		<?php  
			while ($row = mysqli_fetch_assoc($query2)) {
		?>
		<input type="text" value="<?= $row['nama'] ?>" name="nama">
		<input type="text" value="<?= $row['kelas'] ?>" name="kelas">
		<input type="text" readonly value="<?= $row['jurusan'] ?>" name="jurusans">
		<select name="jurusan">
			<?php
				$query = mysqli_query($conn, "SELECT * FROM jurusan");
				while($row = mysqli_fetch_assoc($query)){
			?>
			<option name="jurusan" value="<?= $row['id_jurusan'] ?>"><?= $row['jurusan'] ?></option>
			<?php 
				}
			?>
		</select>
		<button name="submit" value="submit">Submit</button>
		<?php } ?>
	</form>
</body>
</html>