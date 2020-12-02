<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Id_Motor			= $_POST['Id_Motor'];
			$Nama_Motor			= $_POST['Nama_Motor'];
			$Merk_Motor	= $_POST['Merk_Motor'];
			$Jenis_Motor		= $_POST['Jenis_Motor'];

			$cek = mysqli_query($koneksi, "SELECT * FROM motor WHERE Id_Motor='$Id_Motor'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO motor(Id_Motor, Nama_Motor, Merk_motor, Jenis_Motor) VALUES('$Id_Motor', '$Nama_Motor', '$Merk_Motor', '$Jenis_Motor')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_dm";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, ID MOTOR sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_dm" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id_Motor</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Id_Motor" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Motor</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Motor" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Merk Motor</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Merk_Motor" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis_Motor</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Jenis_Motor" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
