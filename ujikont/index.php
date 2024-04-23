<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama Murid</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Menu</th>
		</tr>
		<?php  
			include 'conn.php';
			$query = mysqli_query($conn, "SELECT * FROM murid JOIN jurusan ON jurusan.id_jurusan = murid.id_jurusan");
			$no = 1;
			while ($data = mysqli_fetch_assoc($query)) {
		?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $data['nama'] ?></td>
			<td><?= $data['kelas'] ?></td>
			<td><?= $data['jurusan'] ?></td>
			<td>
				<a href="edit.php?id=<?= $data['id_murid'] ?>">Edit</a>
				<a href="hapus.php?id=<?= $data['id_murid'] ?>">Hapus</a>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
	<h1>Tambah Data Murid</h1>
	<?php

		if (isset($_POST['submit'])) {
			$nama = $_POST['nama'];
			$kelas = $_POST['kelas'];
			$jurusan = $_POST['jurusan'];

			$query = mysqli_query($conn, "INSERT INTO murid VALUES ('', '$jurusan', '$nama', '$kelas')");
			
			if ($query) {
				header("Location: index.php?berhasil");
			} else{
				header("Location: index.php?gagal");
			}
		}

	?>
	<form method="POST">
		<input type="text" name="nama">
		<input type="text" name="kelas">
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
	</form>
</body>
</html>