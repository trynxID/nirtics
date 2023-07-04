<?php 
session_start();
if(!empty($_SESSION['status'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD Mahasiswa</title>
	<link rel="stylesheet" link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="mt-4 mb-4">CRUD Mahasiswa</h1>
		<?php include 'koneksi.php';
		$sql = "SELECT * FROM mahasiswa";
		$result = mysqli_query($link,$sql);
		?>
		<a href="logout.php" class="btn btn-danger">Logout</a>
		<table class="table">
			<thead>
				<tr>
					<th>NIM</th>
					<th>Nama</th>
					<th>No HP</th>
					<th>Jenis Kelamin</th>
					<th>Jurusan</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = mysqli_fetch_assoc($result)) {?>
				<tr>
					<td><?php echo $row['nim']; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['no_hp']; ?></td>
					<td><?php echo $row['jenis_kelamin']; ?></td>
					<td><?php echo $row['jurusan']; ?></td>
					<td><?php echo $row['alamat']; ?></td>
					<td>
						<a href="form_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
						<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<a href="form_tambah.php" class="btn btn-success">Tambah Mahasiswa</a>
	</div>
</body>
</html>
<?php } else {
	echo "<h2>Harus Login terlebih Dahulu</h2>";
	echo "<a href=index.php>Login</a>";
}?>